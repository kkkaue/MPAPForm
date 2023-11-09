export function atualizarNomeArquivo(fileInputId){
    const fileInput = document.getElementById(fileInputId);
    const label = document.getElementById(fileInputId + "_file_name");

    const fileName = fileInput.value.split("\\").pop();
    if (fileName.length > 20) {
        label.innerHTML = fileName.substring(0, 10) + "..." + fileName.slice(-10);
    } else {
        label.innerHTML = fileName;
    }
}