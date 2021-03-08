const aluno = document.getElementById('insert-aluno')
const res = document.getElementById('resultado')

function insert(){
    aluno.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(aluno);
        const searchParams = new URLSearchParams()

        for(const pair of formData){
            searchParams.append(pair[0], pair[1])
        }

        fetch('../../../SGN/source/Controllers/alunosInsert.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            res.innerHTML = data
        })
        .catch(err => {
            console.log(err)
        })
    })
}

insert();