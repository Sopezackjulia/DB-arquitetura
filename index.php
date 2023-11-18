<!DOCTYPE html>
<html lang=pt-br>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> DB Arquitetura </title>

        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script src="js/script.js" defer></script>
        <header>
            <a href="#"class="logo" id="inicio"> DB Arquitetura </a>

            <nav class="navbar">
                <a href="#inicio"> Início </a>
                <a href="#sobre"> Sobre nós </a>
                <a href="#projetos"> Projetos </a>
                <a href="#info"> Contato </a>
            </nav>

        </header>
        <section class="home">
            <div class="content">
                <h3> DB Arquitetura </h3>
                <p> Somos uma empresa de arquitetura que se destaca pela inovação, excelência e design visionário,
                    criando espaços que vão além do comum e transformam a experiência arquitetônica.</p>
                <a href="form.html" class="btn"> Faça o seu orçamento aqui! </a>
            </div>
        </section>
        <section class="about">
            <h1 class="heading" id="sobre"> Sobre nós</h1>

            <div class="row">
                <div class="foto-container">
                    <img src="imagens/casa.jpg" height="500em" width="500em" ></img>
                </div>

                <div class="content">
                    <h3> NOSSA MISSÃO: </h3>
                    <p> Nossa missão é tornar sonhos em realidade através da nossa arquitetura, transformando e inspirando a vida de nossos clientes</p>
                </div>
                <div class="content2">
                    <h3> ESPECIALIZAÇÕES: </h3>
                    <p> Nossa missão é tornar sonhos em realidade através da nossa arquitetura, transformando e inspirando a vida de nossos clientes</p>
                </div>
            </div>
        </section>
        <!-- Seção para fotos de trabalhos recentes-->
        <section class="slides">
            <div class="projetosrecentes"> <h1 id="projetos"> Projetos Recentes</h1> </div>
            <section class="FotosRecente">
            <!-- Fotos presentes no carrosel-->
                <div class="fotos">
                    <div class="foto ac">
                        <img src="imagens/sld1.jpg" width="200px">
                            <div class="titulo">
                                <h2>ArchiVita</h2>
                                <p>DEZ/2021</p>
                            </div>
                    </div>
                    <div class="foto ">
                        <img src="imagens/sld2.jpg" width="200px">
                            <div class="titulo">
                                <h2>Manoir De Luxe</h2>
                                <p>FEV/2022</p>
                            </div>
                    </div>
                    <div class="foto ">
                        <img src="imagens/sld3.jpg" width="200px">
                            <div class="titulo">
                                <h2>La Maison Belle</h2>
                                <p>OUT/2022</p>
                            </div>
                    </div>
                    <div class="foto ">
                        <img src="imagens/sld6.jpg" width="200px">
                            <div class="titulo">
                                <h2>Cozy House</h2>
                                <p>JAN/2023</p>
                            </div>
                    </div>
                    <div class="foto ">
                        <img src="imagens/sld5.jpg" width="200px">
                            <div class="titulo">
                                <h2>Residenziale Ma Bello</h2>
                                <p>MAI/2023</p>
                            </div>
                    </div>
                </div>
            </section>
        </section>
        <footer id="info">
            <ul class="contact-list">
                <li class="list-item"><span class="contact-text">Porto Alegre, RS</span></li>
                <li class="list-item"><span class="contact-text">(51) 90000-0000</span></li>
                <li class="list-item"><span class="contact-text"><a href="DbArquitetura@gmail.com" title="Contato">DbArquitetura@gmail.com</a></span></li>
              </ul>
        </footer>
    </body>
</html>