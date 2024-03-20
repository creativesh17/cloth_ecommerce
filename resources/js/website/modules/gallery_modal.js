window.show_gallery_modal = function(data = {}){
    event.preventDefault();
    var gallery_modal = new bootstrap.Modal('#galleryModal');
    document.getElementById('gallery_modal_image').src = data.full_url;
    document.getElementById('gallery_modal_order').href += `?subject=contact for ${data.title}`;
    document.getElementById('gallery_modal_content').innerHTML = `
        <div>
            <h4 class="heading">${data.title}</h4>
            <p>
                ${data.description}
            </p>
        </div>
    `;
    console.log(data);
    gallery_modal.show();
}
