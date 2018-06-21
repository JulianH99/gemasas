
document.querySelector('#uploaded_file').addEventListener('change', function() {
    let input = document.querySelector('#filename');

    input.value = this.files.item(0).name;
});