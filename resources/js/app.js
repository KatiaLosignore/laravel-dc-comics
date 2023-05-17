import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


//Eliminare un comic con la conferma nella index e show

const deleteForms = document.querySelectorAll('.delete');

deleteForms.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const confirm = window.confirm('Are you sure you want to delete the selected comic ?');
        if(confirm) form.submit();
    })
})

