function emptyDropDown(ele) {
    $(ele).empty();
    // after empty need to reinitialize the dropdown
}

function initializeAllSelect2(selector='.select2') {
    $(selector).each(function () {
        initializeSelect2(this, $(this).data('placeholder'), $(this).data('default-selected'))
    });
}

function initializeSelect2(ele, message = 'Select a Value', defaultVal) {
    $(ele).append('<option value=""></option>')
    $(ele).select2({'placeholder' : message, 'allowClear': true, width: '100%'}).val(defaultVal);
    $(ele).change();
}

function showLoader() {
    $('.loader_body').removeClass('d-none');
}

function hideLoader() {
    $('.loader_body').addClass('d-none');
}

showLoader();

$(window).on('load', function () {
    hideLoader();
});

function showConfirmationSwal() {
    console.log('ss');
    return Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, submit it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    });
}

function showJSONErrorSwal(errors, message) {
    let html = '<div style="text-align: left;padding: 0 40px;">';
    $.each(errors, function (i, item) {
        html += `<li>${JSON.stringify(isArray(item) ? item[0] : item)}</li><br>`
    });
    html+='</div>';
    return swal.fire({
        title: message,
        icon: "error",
        html,
        type: "error",
    });
}

function showResponseErrorSwal(response) {
    if (response.responseJSON.errors) {
        return showJSONErrorSwal(response.responseJSON.errors, response.responseJSON.message);
    } else if (response.errors) {
        return swal.fire({
            title: 'Error!',
            icon: "error",
            text: response.errors,
            type: "error",
        });
    } else {
        return swal.fire({
            title: "Error!",
            icon: "error",
            text: 'Something went wrong! please refresh and try again',
            type: "error",
        });
    }
}

function showSuccessSwal(message){
    return Swal.fire({
        icon: "success",
        title: "Success!",
        text: message,
    });
}

function showErrorSwal(message){
    return Swal.fire({
        icon: "error",
        title: "Error!",
        text: message,
    });
}

function showDefaultServerErrorMessage(message = "Sorry, something went wrong from our side.😒"){
    return Swal.fire({
        text: message,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok, I will wait!",
        customClass: {
            confirmButton: "btn font-weight-bold btn-light"
        },
    });
}
