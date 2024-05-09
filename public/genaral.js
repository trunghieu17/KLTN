function displaySuccess(res) {
    if(res.data.status) {
        toastr.success(res.data.message);
    } else {
        toastr.error(res.data.message);
    }
}

function displayError(error) {
    if(error.response.request.status == 422) {
        let data = error.response.data.errors;
        data = Object.values(data);
        data.forEach(element => {
            toastr.error(element[0]);
        });
    } else if(error.response.request.status == 500) {
        toastr.error(error.response.data.message);
    }
}

function formatTien(number) {
    number = parseInt(number);
    return number.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}
