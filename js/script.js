//Seleciona as imagens com a classe fotos
const fotos = document.querySelectorAll('.foto');

//Coloca um evente de clique nas fotos
fotos.forEach(foto => {
    foto.addEventListener('click', () => {
        //Remove a estilização da classe .ac das imagens secundárias
        fotos.forEach(c => {
            if(c !== foto){
                c.classList.remove('ac');
            }
        });

        //Adiciona estilização da classe .ac para a imagem clicada
        foto.classList.add('ac');
    });
});
