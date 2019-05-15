<template>
    <div id="articleImage">
        <div class="text-center">
            <img class="img-fluid mx-auto border rounded" :src="imagePath + image" alt="Card image cap">
        </div>
        <div class="form-group custom-file mt-3">
            <input type="file" class="custom-file-input" id="customFile" multiple v-on:change="onImageChange">
            <label class="custom-file-label" for="customFile">Додати зображення</label>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                image: "no_image.png",
                imagePath: "/images/"
            }
        },
        props:["imageData", "updateUrl", "setLogoUrl", "imagesPath"],
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                for (const key of Object.keys(files)) {
                    this.createImage(files[key]);
                };
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.imageData = e.target.result;
                    vm.uploadImage();
                };
                reader.readAsDataURL(file);
            },
            uploadImage(){
                let updateUrl = this.updateUrl;
                axios.post(updateUrl, {"image": this.imageData,})
                    .then(response => {
                        this.images.push(response.data);
                        runToastmessage("Зображення успішно завантажені");
                    })
                    .catch(function (error) {
                        console.log(error.response.data.error);
                        runToastmessage(error.response.data.error, "error");
                    });
            },
            deleteImage(imageId){
                let url = this.updateUrl;
                let sendData = {
                    imageId: imageId,
                    _method: "DELETE"
                    }
                axios.post(url, sendData)
                    .then(response => {
                        this.images = response.data;
                        runToastmessage("Товар успішно видалено");
                    })
                    .catch(function (error) {
                        console.log(error.response.data.error);
                        runToastmessage(error.response.data.error, "error");
                    });
            }
        }
    }
</script>
<style scoped>
    #articleImage img {
    }
</style>