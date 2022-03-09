<?php

namespace App\Helpers\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Utils
{
    /**
     * This method returns system time in milli seconds.
     * @return float
     */
    public static function getSystemTimeInMillis(): float
    {
        return round(microtime(true) * 1000);
    }


    /**
     * Method accepts the amount and returns the amount in words
     * @param float $number
     * @return string
     */
    public static function getIndianCurrency(float $number): string
    {
        $formatter = new \NumberFormatter("en_IN", \NumberFormatter::SPELLOUT);
        return $formatter->formatCurrency($number, "INR");
    }

    public static function numberToPrice(float $val): string
    {
        return number_format(round($val, 2), 2);
    }

    public static function toIndianDate($date): string
    {
        return Carbon::parse($date)->format("d/m/Y");
    }

    /**
     * Validates the data with the given validation rules
     * @param array $validationRules
     * @param array $data
     * @return array
     * @throws ValidationException|\Throwable
     */
    public static function validateOrThrow(array $validationRules, array $data, array $customAttributes = []): array
    {
        $validator = Validator::make($data, $validationRules, customAttributes: $customAttributes);
        throw_if($validator->fails(), ValidationException::withMessages($validator->getMessageBag()->toArray()));
        return $validator->validated();
    }

    public static function isProductionMode(): bool
    {
        return env('APP_ENV') == 'production';
    }

    /**
     * @param mixed $obj
     * @param array $classes
     * @return bool
     * @throws \Exception
     */
    public static function checkInstanceOrThrow(mixed $obj, array $classes): bool
    {
        $instanceVerified = false;
        foreach ($classes as $class) {
            if ($obj instanceof $class) {
                $instanceVerified = true;
                break;
            }
        }
        if (!$instanceVerified) {
            throw new \Exception('Invalid object ' . $obj);
        }
        return true;
    }

    public static function getShortName(string $str): string
    {
        return strtolower(str_replace(' ', '-', $str));
    }

    /**
     * @param array $values
     * @return array
     */
    public static function validateUniqueInArrayOrThrow(array $values, $message): array
    {
        if (count($values) !== count(array_flip($values))) {
            throw new \Exception($message);
        }
        return $values;
    }

    /**
     * @param mixed $object
     * @return string
     * @throws \ReflectionException
     * @throws \Exception
     */
    public static function getShortClass(mixed $object): string
    {
        if (!is_object($object)) {
            throw new \Exception("Given argument is not an object");
        }
        return strtolower((new \ReflectionClass($object))->getShortName());
    }

    /**
     * @param UploadedFile $file
     * @param string $prefix
     * @return string
     */
    public static function generateFileName(UploadedFile $file, string $prefix = ''): string
    {
        return $prefix .
            pathinfo($file->getClientOriginalName())['filename'] .
            '_' . uniqid() .
            '.' . $file->clientExtension();
    }

    public static function cartesian($input)
    {
        $result = array();

        foreach ($input as $key => $values) {
            if (empty($values)) {
                continue;
            }

            if (empty($result)) {
                foreach ($values as $value) {
                    $result[] = array($key => $value);
                }
            } else {
                $append = array();

                foreach ($result as &$product) {
                    $product[$key] = array_shift($values);

                    $copy = $product;

                    foreach ($values as $item) {
                        $copy[$key] = $item;
                        $append[] = $copy;
                    }

                    array_unshift($values, $product[$key]);
                }

                $result = array_merge($result, $append);
            }
        }

        return $result;
    }

    public static function optionToMetaDataColumn($string): string
    {
        return strtolower(str_replace(' ', '_', $string));
    }

    /**
     * @param $string
     * @return string
     */
    public static function strToAcronym($string): string
    {
        $acronym = '';
        $words = explode(' ', $string);

        foreach ($words as $word) {
            $acronym .= strtolower(substr($word, 0, 1));
        }

        return $acronym;
    }

    public static function reverseCalculateGST($amount, $taxRate): float
    {
        return ($amount / (1 + ($taxRate / 100)));
    }

    public static function calculateGST($amount, $taxRate, $round = false): float
    {
        $GSTAmount = (($amount * $taxRate) / 100);
        return ($round ? round($GSTAmount) : $GSTAmount);
    }

    public static function calculateReverseGSTForMultipleItems(
        float $cgst,
        float $sgst,
        float $igst,
        float $amount,
        int $quantity,
        int $totalQuantity,
        float $sumOfPreviousCharges,
        bool $isLast
    ): array {
        $data = [];
        $itemQuantityRatio = ($quantity / $totalQuantity);
        $chargeRatioAmount = round($amount * $itemQuantityRatio, 2);
        $data['cgst_tax_rate'] = $cgst;
        $data['sgst_tax_rate'] = $sgst;
        $data['igst_tax_rate'] = $igst;

        $data['cgst_tax_amount'] = 0;
        $data['sgst_tax_amount'] = 0;
        $data['igst_tax_amount'] = 0;

        if ($data['igst_tax_rate'] > 0 && $data['igst_tax_rate'] > ($data['cgst_tax_rate'] + $data['sgst_tax_rate'])) {
            $reverseGST = Utils::reverseCalculateGST($chargeRatioAmount, $data['igst_tax_rate']);
            $roundOffAmount = $isLast ? ($amount - ($sumOfPreviousCharges + $chargeRatioAmount)) : 0;
            $data['amount_without_tax'] = $reverseGST + round($roundOffAmount, 2);
            $data['igst_tax_amount'] = round((($data['amount_without_tax'] * $data['igst_tax_rate']) / 100), 2);
            $data['amount_without_tax'] = ($chargeRatioAmount + round($roundOffAmount, 2)) - ($data['igst_tax_rate']);
        } elseif (($data['cgst_tax_rate'] + $data['sgst_tax_rate']) > 0) {
            $reverseGST = round(Utils::reverseCalculateGST($chargeRatioAmount, ($data['cgst_tax_rate'] + $data['sgst_tax_rate'])), 2);
            $roundOffAmount = $isLast ? ($amount - ($sumOfPreviousCharges + $chargeRatioAmount)) : 0;
            $data['amount_without_tax'] = $reverseGST + round($roundOffAmount, 2);
            $data['cgst_tax_amount'] = round((($data['amount_without_tax'] * $data['cgst_tax_rate']) / 100), 2);
            $data['sgst_tax_amount'] = round(($data['amount_without_tax'] * $data['sgst_tax_rate'] / 100), 2);
            $data['amount_without_tax'] = ($chargeRatioAmount + round($roundOffAmount, 2)) - ($data['cgst_tax_amount'] + $data['sgst_tax_amount']);
        } else {
            $data['cgst_tax_rate'] = 0;
            $data['sgst_tax_rate'] = 0;
            $data['igst_tax_rate'] = 0;
            $data['amount_without_tax'] = $chargeRatioAmount;
        }

        return $data;
    }

    public static function calculateReverseGST(float $cgst, float $sgst, float $igst, float $amount)
    {
        $data = [];
        $data['cgst_tax_rate'] = $cgst;
        $data['sgst_tax_rate'] = $sgst;
        $data['igst_tax_rate'] = $igst;

        $data['cgst_tax_amount'] = 0;
        $data['sgst_tax_amount'] = 0;
        $data['igst_tax_amount'] = 0;

        if ($data['igst_tax_rate'] > 0 && $data['igst_tax_rate'] > ($data['cgst_tax_rate'] + $data['sgst_tax_rate'])) {
            $reverseGST = round(Utils::reverseCalculateGST($amount, $data['igst_tax_rate']), 2);
            $data['igst_tax_amount'] = round($amount - $reverseGST, 2);
            $data['amount_without_tax'] = round(($amount - $data['igst_tax_amount']), 2);
        } elseif (($data['cgst_tax_rate'] + $data['sgst_tax_rate']) > 0) {
            $reverseGST = round(Utils::reverseCalculateGST($amount, ($data['cgst_tax_rate'] + $data['sgst_tax_rate'])), 2);
            $data['cgst_tax_amount'] = round(($amount - $reverseGST) / 2, 2);
            $data['sgst_tax_amount'] = round(($amount - $reverseGST) / 2, 2);

            $data['amount_without_tax'] = round(($amount - ($data['cgst_tax_amount'] + $data['sgst_tax_amount'])), 2);
        } else {
            $data['cgst_tax_rate'] = 0;
            $data['sgst_tax_rate'] = 0;
            $data['igst_tax_rate'] = 0;
            $data['amount_without_tax'] = $amount;
        }

        return $data;
    }

    public static function calculateProductShare(float $allItemsMrps, float $individualItem)
    {
        return round(($individualItem / $allItemsMrps), 2);
    }

    public static function doesRouteBelongsToCurrentTab(?string $currentRoute, ?string $tabRoute): bool
    {
        if (!$tabRoute) {
            return false;
        }
        $explodedParentRoute = explode(".", $currentRoute);
        $parentRouteSize = sizeof($explodedParentRoute);
        $explodedTabRoute = explode(".", $tabRoute);
        $tabRouteSize = sizeof($explodedTabRoute);
        return ($parentRouteSize >= 2 && $tabRouteSize >= 2)
        && $explodedParentRoute[$parentRouteSize-2] === $explodedTabRoute[$tabRouteSize-2];
    }

    public static function replaceSpaceAndUC(string $string)
    {
        return strtoupper(str_replace(' ', '_', str_replace(' - ', '_', $string)));
    }

    public static function calculateDiscountPercentage($mrp, $unitPrice, $decimal = 2)
    {
        return round((($mrp - ($mrp - $unitPrice)) / $mrp) * 100, $decimal);
    }

    public static function replaceAllDoubleQuotes(string $string)
    {
        return str_replace('"', "", $string);
    }

    public static function uploadScheduleTaskFile(UploadedFile $uploadedFile){
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileName = rand(0, 99). Carbon::now()->getTimestamp().'.'.$extension;
        Storage::disk('schedule_tasks')->put($fileName, $uploadedFile->getContent());
        return Storage::path('schedule-tasks/'.$fileName);
    }
}
