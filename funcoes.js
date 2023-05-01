function GerarCodigo(){
    let cod = 7891020301;
    let sorteio = 999;
    let random = function sortearNumero() { return Math.floor(Math.random() * sorteio + 100); }
    let codigo = cod + "" + random();
    return codigo;
}
