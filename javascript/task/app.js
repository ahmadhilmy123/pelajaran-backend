/**
 * TODO 9:
 * - Import semua method FruitController
 * - Refactor variable ke ES6 Variable
 *
 * @hint - Gunakan Destructing Object
 */

const { index, store, update, destroy } = require("./FruitController");

/**
 * NOTES:
 * - Fungsi main tidak perlu diubah
 * - Jalankan program: node app.js
 */
const main = () => {
  console.log("Buah:", index());
  console.log(store("Melon"));
  console.log("Buah:", index());
  console.log(update(1, "Tomat"));
  console.log("Buah:", index());
  console.log(destroy(0));
  console.log("Buah:", index());
};

main();
