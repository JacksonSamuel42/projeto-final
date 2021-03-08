const updateA = document.getElementById('update-aluno')
const res = document.getElementById('resultado')

function update(){
    updateA.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(updateA);
        const searchParams = new URLSearchParams()

        for(const pair of formData){
            searchParams.append(pair[0], pair[1])
        }

        fetch('../../../SGN/source/Controllers/alunosUpdate.php', {
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

update();