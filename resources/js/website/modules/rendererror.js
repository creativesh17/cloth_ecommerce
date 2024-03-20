window.render_error = (object) => {
    let data = object;
    // console.log(data);
    $('.loader_body').removeClass('active');
    $('form button').prop('disabled', false);
    $('#backend_body .main_content').css({ overflowY: 'scroll' });
    // whatever you want to do with the error
    // console.log(error.response.data.errors);
    $(`label`).siblings(".text-danger").remove();
    $(`select`).siblings(".text-danger").remove();
    $(`input`).siblings(".text-danger").remove();
    $(`textarea`).siblings(".text-danger").remove();
    $('.form_errors').html('');
    let error_html = ``;

    for (const key in object) {
        if (Object.hasOwnProperty.call(object, key)) {
            const element = object[key];
            if (document.getElementById(`${key}`)) {
                $(`#${key}`)
                    .parent("div")
                    .append(`<div class="text-danger">${element[0]}</div>`);
                $('html')[0].scrollTo(0,$(`[name="${key}"]`)[0].scrollHeight);

            } else {
                $(`[name="${key}"]`)
                    .parent("div")
                    .append(`<div class="text-danger">${element[0]}</div>`);

                $(`[name="${key}"]`).trigger("focus");
                $('html')[0].scrollTo(0,$(`[name="${key}"]`)[0].scrollHeight);
            }
            // console.log({
            //     [key]: element,
            // });

            error_html += `
                <div class="alert alert_${key} my-1 mx-2 alert-danger pe-5 inverse alert-dismissible fade show" role="alert">
                    <i class="icon-alert txt-dark rounded-0"></i>
                    <div>${element}</div>
                    <button type="button" class="btn-close txt-light" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
            `;
        }
    }

    $('.form_errors').html(error_html);

    if (typeof data === "string") {
        // console.log("error", data);
    } else {
        // console.log(data);
    }

    window.s_alert("check error below", 'error')
}
