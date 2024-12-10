const fruits = require("./fruits");

const index = () => {
    return fruits;
};

const store = (name) => {
    fruits.push(name);
    return `${name} telah ditambahkan.`;
};


const update = (position, name) => {
    if (position < 0 || position >= fruits.length) {
        return "Posisi tidak valid.";
    }
    const oldName = fruits[position];
    fruits[position] = name;
    return `${oldName} telah di perbarui menjadi ${name}.`;
};


const destroy = (position) => {
    if (position < 0 || position >= fruits.length) {
        return "Posisi tidak valid";
    }
    const deleted = fruits.splice(position, 1);
    return `${deleted[0]} Berhasil Dihapus.`;
};


module.exports = { index, store, update, destroy };