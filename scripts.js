// scripts.js
const form = document.getElementById('anuncioForm');
const resultado = document.getElementById('resultado');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const linkAnuncio = document.getElementById('linkAnuncio').value;

    // Enviar o link do anúncio para processamento.php usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'processamento.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            resultado.innerHTML = xhr.responseText;
        }
    };
    xhr.send('linkAnuncio=' + encodeURIComponent(linkAnuncio));
});

function editarImovel(id) {
    // Implementar a lógica de edição (opcional, depende da necessidade)
    console.log('Editar imóvel com ID: ' + id);
}

function deletarImovel(id) {
    // Implementar a lógica de exclusão (opcional, depende da necessidade)
    console.log('Excluir imóvel com ID: ' + id);
}