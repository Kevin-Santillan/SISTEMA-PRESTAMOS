function numeroletra(input) {
    const maxlength = input.getAttribute('maxlength');
    input.value = input.value.replace(/[^0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, '').slice(0, maxlength);
}

function direccion(input) {
    const maxlength = input.getAttribute('maxlength');
    input.value = input.value.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]/g, '').slice(0, maxlength);
}

function numero(input) {
    const maxlength = input.getAttribute('maxlength');
    input.value = input.value.replace(/[^0-9]/g, '').slice(0, maxlength);
}

function letra(input) {
    const maxlength = input.getAttribute('maxlength');
    input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0 ]/g, '').slice(0, maxlength);
}

function contra(input) {
    const maxlength = input.getAttribute('maxlength');
    input.value = input.value.replace(/[^a-zA-Z0-9$@.-]/g, '').slice(0,  maxlength);
}
