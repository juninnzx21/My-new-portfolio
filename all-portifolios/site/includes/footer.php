<footer class="text-light p-3 mt-4 bg-dark animate__animated animate__fadeInBottomLeft">
    <div class="row  m-auto">
        <div class="row">
            <div class="col-xl-3 col-sm-12 box-footer ">
                <h5 class="text-center">Endereço</h5>
                <p class="text-center">Rua Não localizada, 19999 - Nem conheço, Não existe-MG, 387897897,
                    Brasil</p>
                <p class="text-center">Rua Não localizada, 19999 - Nem conheço, Não existe-MG, 387897897,
                    Brasil</p>
            </div>
            <div class="col-xl-3 col-sm-12 box-footer">
                <h5 class="text-center">Telefone</h5>
                <p class="text-center">(31) 9999-9999</p>
            </div>
            <div class="col-xl-3 col-sm-12 box-footer">
                <div>
                    <h6 class="text-center">Whatsapp da unidade de Belo Horizonte</h6>
                    <p class="text-center">(31) 9 9999-9999</p>
                    <p class="text-center">(31) 9 9999-9999</p>
                </div>
                <div>
                    <h6 class="text-center">Whatsapp da unidade de São Paulo</h6>
                    <p class="text-center">(11) 9 9999-9999</p>
                    <p class="text-center">(11) 9 9999-9999</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-12 box-footer">

                <div class="text-center">
                    <font color='white'>Converse com um de nossos atendentes nas redes sociais a seguir!</font>
                    <a href='https://www.facebook.com/multicredbh'><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Facebook_icon.svg/2048px-Facebook_icon.svg.png"
                            style="max-height: 25px"></a>
                    <a href='https://www.instagram.com/multicredbh/'><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt="" class="img-fluid"
                            style="max-height: 25px"></a>
                    <a
                        href='https://api.whatsapp.com/send?phone=553191739320&text=Ol%C3%A1%20MulticredBH%20vim%20pelo%20site%2C%20quero%20adquirir%20meu%20orçamento%20agora!'><img
                            src="https://www.iconpacks.net/icons/2/free-whatsapp-logo-icon-4454-thumb.png" alt="" class="img-fluid"
                            style="max-height: 25px"></a>

                </div>

                <a class="nav-link text-center text-white" href="<?=$url?>pages/atendimento-ao-cliente.php">Atendimento
                    ao
                    Cliente</a>
                <h5 class="text-center text-">Receba nossas news</h5>
                <form method="post" action="<?=$url?>includes/process2.php">
                    <div class="input-group mb-3">
                        <input name='email' class="form-control" placeholder="E-mail..." type="email">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <hr>
    <p class="p-2 text-center">© <?= date('Y')?>. Todos os direitos reservados. Multicredbh Crédito Financiamento e
        Investimento.</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<!----------------------------------------->
<!--TODO: CRIAR SCROLL PARA FORM DE CONTATO!-->
<script src="assets/js/jquery.js"></script>
<script>
$('nav.mobile h3').click(function() {
    $('nav.mobile').find('ul').slideToggle();
})
</script>
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>
<div class="snackbars" id="form-output-global"></div>


</body>

</html>


