/*Funcion para subir imagen*/
const $fileInput = document.getElementById('image')
const $dropZone = document.getElementById('result-image')
const $img = document.getElementById('img-result')

$dropZone.addEventListener('click', () => $fileInput.click())

$dropZone.addEventListener('dragover', (e) => {
	e.preventDefault()

	$dropZone.classList.add('form-file__result--active')
})

$dropZone.addEventListener('dragleave', (e) => {
	e.preventDefault()

	$dropZone.classList.remove('form-file__result--active')
})

const uploadImage = (file) => {
	const fileReader = new FileReader()
	fileReader.readAsDataURL(file)

	fileReader.addEventListener('load', (e) => {
		$img.setAttribute('src', e.target.result)
	})
}

$dropZone.addEventListener('drop', (e) => {
	e.preventDefault()

	/* console.log(e.dataTransfer) */

	$fileInput.files = e.dataTransfer.files
	const file = $fileInput.files[0]

	uploadImage(file)
})

$fileInput.addEventListener('change', (e) => {
	/* console.log(e.target.files[0]) */
	const file = e.target.files[0]

	uploadImage(file)
})

/*Funcion para subir PDF*/
const $pdfInput = document.getElementById('pdf');
const $pdfDropZone = document.querySelector('.form-file-pdf__action');

$pdfDropZone.addEventListener('click', () => $pdfInput.click());

$pdfDropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    $pdfDropZone.classList.add('form-file__result--active');
});

$pdfDropZone.addEventListener('dragleave', (e) => {
    e.preventDefault();
    $pdfDropZone.classList.remove('form-file__result--active');
});

$pdfDropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    $pdfInput.files = e.dataTransfer.files;
});

$pdfInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    // Aquí puedes agregar la lógica para manejar el archivo PDF seleccionado
    console.log('PDF seleccionado:', file);
});

