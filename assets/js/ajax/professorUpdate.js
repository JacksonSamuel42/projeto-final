const updateP = document.getElementById('update-professor')
const res = document.getElementById('resultado')

function update(){
    updateP.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(updateP);
        const searchParams = new URLSearchParams()

        for(const pair of formData){
            searchParams.append(pair[0], pair[1])
        }

        fetch('../../../SGN/source/Controllers/ProfessoresUpdate.php', {
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