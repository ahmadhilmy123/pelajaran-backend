// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();

    // data array lebih dari 0
    if (students.length > 0) {
      const data = {
        message: "Menampilkan semua students",
        data: students,
      };

      return res.status(200).json(data);
    }

    // else
    const data = {
      message: "Student is empty",
    };

    return res.status(200).json(data);
  }

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */

    /**
     * Validasi sederhana
     * - Handle jika salah satu data tidak diisi
     */

    // destructuring object req.body
    const { nama, nim, email, jurusan } = req.body;

    // jika data undifined maka kirimkan response
    if (!nama || !nim || !email || !jurusan) {
      const data = {
        message: "Semua data harus diisi",
      };

      return res.status(422).json(data);
    }

    // else
    const students = await Student.create(req.body);

    const data = {
      message: "Menambahkan data student",
      data: students,
    };

    return res.status(201).json(data);
  }

  async show(req, res) {
    const { id } = req.params;
    // cari student berdasarkan id
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: "Menampilkan detail student",
        data: student,
      };

      return res.status(200).json(data);
    }
    // else
    const data = {
      message: "Student not found",
    };

    return res.status(404).json(data);
  }

  async update(req, res) {
    const { id } = req.params;

    // cari student yang ingin diupdate
    const student = await Student.find(id);

    if (student) {
      // melakukan update data
      const student = await Student.update(id, req.body);
      const data = {
        message: `Mengedit data students`,
        data: student,
      };

      return res.status(200).json(data);
    }

    // else
    const data = {
      message: `Student not found`,
    };

    return res.status(404).json(data);
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await Student.delete(id);
      const data = {
        message: `Menghapus data students`,
      };

      return res.status(200).json(data);
    }
    // else
    const data = {
      message: `Student not found`,
    };

    return res.status(404).json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;