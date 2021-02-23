export default {
    getDefaultElements(){
        this.btnAdd = document.getElementById('adicionar-nota');
        this.btnEdit = document.getElementById('edit-nota');
    },

    getElementNota(){
        this.displayDocs = $('#displayDocs');
        this.ocultarDosNotAdd = $('#docsNotAdd');

        this.disciplina = document.getElementById('disciplina');
        this.nota1 = document.getElementById('nota1');
        this.nota2 = document.getElementById('nota2');
        this.nota3 = document.getElementById('nota3');
        this.dataNota = document.getElementById('data-nota');
        this.trimestre = document.getElementById('trimestre-nota');
        this.idAluno = document.getElementById('id-aluno');
    },

    getElementEdit(){
        this.disciplina = document.getElementById('disciplina-update');
        this.nota1 = document.getElementById('nota1-update');
        this.nota2 = document.getElementById('nota2-update');
        this.nota3 = document.getElementById('nota3-update');
        this.dataNota = document.getElementById('data-nota-update');
        this.trimestre = document.getElementById('trimestre-nota');
        this.idAluno = document.getElementById('id-aluno-update');
        this.idBoletim = document.getElementById('id-boletim');
    },

    actionNotaAddElement(){
        (this.btnAdd != null) ?  this.btnAdd.onclick = (e) => this.addNota(e) : null;
    }, 

    actionNotaEditElement(){
        (this.btnEdit != null) ?  this.btnEdit.onclick = (e) => this.editNota(e) : null;
    }
}