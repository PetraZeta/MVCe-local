<div class="container ">
    <hr>
    <h6>Filtrar </h6>
    <div>

        <input type="radio" id="hombre" name="sexo" value="h">
        <label for="hombre">Hombre</label>
        <input type="radio" id="mujer" name="sexo" value="m">
        <label for="mujer">Mujer</label>
    </div>
    <div>

        <input type="radio" id="ropa" name="tipo" value="r">
        <label for="ropa">Ropa</label>
        <input type="radio" id="calzado" name="tipo" value="z">
        <label for="calzado">Calzado</label><br>
        <input type="radio" id="complementos" name="tipo" value="c">
        <label for="html">Complementos</label>
    </div>

    <div class="input-group">

        <label for="precio" class="form-label">
            <input class="form-range" type="range" id="precio" min="0" max="500" step="5" value="0" style="width: 90%;">
            Precio hasta: <span class="mx-3" id="prec"> 0</span><span>€</span>
        </label>
    </div>
    <hr >
</div>

<script>
    //añadir precio al span segun se vaya cambiando el valor
    $("#precio").on("change", function(e) {
        $('#prec').text($("#precio").val());
    });
</script>