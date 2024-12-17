const tambah = (a, b) => {
    return a + b;
}

const kurang = (a, b) => {
    return a - b;
}

const calculator = (a, b, operator) => {
    return operator(a, b);
}

// calculator(10, 5, tambah);

// asynchronous callback


/**
 * berenang
 * bersepeda
 * berlari
 */

const berenang = () => {
    console.log("berenang selesai");
}

const bersepeda = () => {
    console.log("bersepeda selesai");
}

const berlari = () => {
    console.log("berlari selesai");
}

const triathlon = () => {
    setTimeout(() => {
        berenang();
         
        setTimeout(() => {
            bersepeda();
            
            setTimeout(() => {
                berlari();
            }, 4000);
        }, 2000);

    }, 6000);


}
triathlon();