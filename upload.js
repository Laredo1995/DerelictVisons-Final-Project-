const image_input = document.querySelector("#image_input");

image_input.addEventListener("change", function () {
    for (let i = 0; i < this.files.length; i++) {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploadedImage = reader.result;
            const image = new Image();
            image.addEventListener("load", () => {
                document.querySelector("#display_image").appendChild(image);
            });
            image.src = uploadedImage;
        });
        reader.readAsDataURL(this.files[i]);
    }
});