// pour afficher l'image selectionner par l'input file
function previewImage(event) {
    var preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
}

function previewImages(event,name) {
    const files = event.target.files;
    const previewContainer = document.getElementById(name);

    // Clear any existing previews
    previewContainer.innerHTML = '';

    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = file.name;
            img.className = 'selected-image';
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

function submit_of_Adding() {
    document.getElementById('createForm').submit();
}



document.getElementById('imgInput').addEventListener('submit', function() {
    if (this.files.length > 0) {
        // Submit the form
        document.getElementById('formImages1').submit(); // Replace 'yourFormId' with the actual ID of your form
    }
    // Check if the file input is not empty
});
