// Show the selected image to upload before saving changes
const file = document.querySelector("#file-image");
const img = document.querySelector(".profil_img2");

file.addEventListener("change", function() {
    const choosedFile = this.files[0];

    if(choosedFile) {
        const reader = new FileReader();
        reader.addEventListener("load", function() {
            img.setAttribute("src", reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});
