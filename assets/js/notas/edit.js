import ui from './ui.js'

export default {
    async start() {
        ui.getElementEdit.call(this)
        ui.getDefaultElements.call(this)
        ui.actionNotaEditElement.call(this)
    },

    async editNota(e) {
        e.preventDefault();

        let infoNotas = [];

        e.preventDefault();

        if (
            this.disciplina.value === '' &&
            this.nota1.value === '' &&
            this.nota2.value === '' &&
            this.nota3.value === '' &&
            this.dataNota.value === ''
        ) {
            message('<div class="text-center alert alert-warning">Você precisa adicionar todos os dados</div>')
            return
        }

        let media = (parseFloat(this.nota1.value) + parseFloat(this.nota2.value) + parseFloat(this.nota3.value)) / 3

        infoNotas.push({
            disciplina: this.disciplina.value,
            nota1: this.nota1.value,
            nota2: this.nota2.value,
            nota3: this.nota3.value,
            data: this.dataNota.value,
            trimestre: this.trimestre.value,
            id: this.idAluno.value,
            id_boletim: this.idBoletim.value,
            media: media
        });

        const xhr = new XMLHttpRequest();

        let formData = new FormData();

        formData.append('data', JSON.stringify(infoNotas));

        xhr.open('POST', './code/gestorNotaEdit.php');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                this.message(xhr.response);
            }
        };

        xhr.send(formData);
    },

    async message(msg) {
        const div = document.createElement('div');
        div.innerHTML = msg
        document.querySelector('#msgEdit').append(div)

        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 4000)
    },
}