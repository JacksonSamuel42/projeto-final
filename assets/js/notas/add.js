import ui from './ui.js'

export default {
    async start() {
        ui.getDefaultElements.call(this)
        ui.getElementNota.call(this)
        ui.actionNotaAddElement.call(this)
    },

    async addNota(e) {
        e.preventDefault();

        let infoNotas = [];


        if (
            this.disciplina.value === '' ||
            this.nota1.value === '' ||
            this.nota2.value === '' ||
            this.nota3.value === '' ||
            this.dataNota === ''
        ) {
            this.message(
                '<div class="text-center alert alert-warning">Você precisa adicionar todos os dados</div>'
            );
            return;
        }

        let newElement = `
            <div class="col-lg-12 content-doc-list-container fadeInLeft animated">
                <div class="content-doc-list  houver-destaque">
                    <p class="doc-list-title">
                        <label title="Clique para adicionar" class="lbl_addDoc ">
                            Nota de ${this.disciplina.value} adicionada

                            <span title="click para selecionar" class="float-right icon-hover p-2" 
                                id="selecionar-nota">
                                <i class="fa fa-hand-pointer"></i>
                            </span>
                            
                            <span class="float-right icon-hover p-2" id="" 
                            data-toggle="modal"
                            data-target="#nota-edit">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span data-target="#delete-users" data-toggle="modal" class="float-right icon-hover p-2" id="delete-nota">
                                <i class="fa fa-trash"></i>
                            </span>
                        </label>
                    </p>
                </div>
            </div>
        `;

        this.ocultarDosNotAdd.hide();

        this.displayDocs.append(newElement);

        let media =
            (parseFloat(this.nota1.value) + parseFloat(this.nota2.value) + parseFloat(this.nota3.value)) /
            3;

        infoNotas.push({
            disciplina: this.disciplina.value,
            nota1: this.nota1.value,
            nota2: this.nota2.value,
            nota3: this.nota3.value,
            data: this.dataNota.value,
            trimestre: this.trimestre.value,
            id: this.idAluno.value,
            media: media.toFixed(2),
        });

        this.disciplina.value = '';
        this.nota1.value = '';
        this.nota2.value = '';
        this.nota3.value = '';
        this.dataNota.value = '';
        this.trimestre.value = '';

        // $('.modal').removeClass('show');
        // $('.modal-backdrop').remove();

        const xhr = new XMLHttpRequest();

        let formData = new FormData();

        formData.append('data', JSON.stringify(infoNotas));

        xhr.open('POST', './code/gestorNota.php');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                this.message(xhr.response);
            }
        };

        xhr.send(formData);
        setTimeout(() => window.location.reload(), 700)
    },

    async message(msg) {
        const div = document.createElement('div');
        div.innerHTML = msg
        document.querySelector('#msg').append(div)

        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 4000)
    },

}