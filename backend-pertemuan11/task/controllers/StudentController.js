// TODO 3: Import data students dari folder data/students.js
const students = require('../data/student');

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    const data = {
      "message": "Menampilkan data students",
      "data": students
    }
    res.json(data), 200
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const { name } = req.body;

    students.push(name);

    const data = {
      message: `Menambahkan data students: ${name}`,
      data: students,
    };

    res.status(201).json(data)
  }

  update(req, res) {
    // TODO 6: Update data students
    const { id } = req.params;
    const { name } = req.body;

    students[id] = name;

    const data = {
      message: `Mengedit students id ${id}: Nama ${name}`,
      data: students,
    };

    res.status(201).json(data)
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    const { id } = req.params;

    students.splice(id, 1);

    const data = {
      message: `Menghapus students id ${id}`,
      data: students,
    };

    res.json(data), 200
  
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;