<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;


class StudentsController extends Controller
{

    public function index() {
        $students = Student::latest();
        
        if (request('search')) {
            $searchTerm = request('search');
            $students->where(function($query) use ($searchTerm) {
                $query->where('nis', 'like', '%' . $searchTerm . '%')
                      ->orWhere('nama', 'like', '%' . $searchTerm . '%');
                    //   ->orWhere('tanggal_lahir', 'like', '%' . $searchTerm . '%')
                    //   ->orWhere('alamat', 'like', '%' . $searchTerm . '%');
            });
        }
        
        if (request()->is('dashboard/student/all')) {
            return view('student_admin.all', [
                "title" => "Students",
                "caption" => "List of All Students",
                "students" => $students->paginate(10),
                "kelas" => Kelas::all()
            ]);
        } else if (request()->is('auth/home/student/student')) {
            return view('student_auth.all', [
                "title" => "Students",
                "caption" => "List of All Students",
                "students" =>  $students->paginate(10),
                "kelas" => Kelas::all()
            ]);
        } else {
            return view('student_guest.all', [
                "title" => "Students",
                "caption" => "List of All Students",
                "students" => $students->paginate(10),
                "kelas" => Kelas::all()
            ]);
        }
        
    }
    

    public function create(Student $student){
        return view('student_admin.create',[
            "title" => "Create Student",
            "kelas" => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $existingStudent = Student::where('nis', $validateData['nis'])->first();

        if ($existingStudent) {
            return back()->with('danger', "The NIS you provide already exist!");
        }

        $result = Student::create($validateData);

        if ($result) {
            return redirect('/dashboard/student/all')->with('success', "Data successfully added");
        }
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        return view('student_admin.edit', [
            "title" => "Edit Student",
            "student" => $student,
            "kelas" => Kelas::all()
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',       
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);

        if ($result) {
            return redirect('/dashboard/student/all')->with('success', "Data successfully updated");
        }
    }

    public function destroy($id)
    {
        $result = Student::destroy($id);
        if ($result) {
            return redirect('/dashboard/student/all')->with('success', "Data Siswa Berhasil Dihapus");
        } 
    }

    public function filter($kelas_id)
    {
        $result = Student::where('kelas_id', $kelas_id)->paginate(10);
    
        if (request()->route()->named('filter_students_auth')) {
            return view('student_admin.all', [
                "title" => "Students",
                "caption" => "Filtered Students",
                "students" => $result,
                "kelas" => Kelas::all()
            ]);
        }
        else if (request()->route()->named('filter_students_home')) {
            return view('student_auth.all', [
                "title" => "Students",
                "caption" => "Filtered Students",
                "students" =>  $result,
                "kelas" => Kelas::all()
            ]);
        } else {
            return view('student_guest.all', [
                "title" => "Students",
                "caption" => "Filtered Students",
                "students" => $result,
                "kelas" => Kelas::all()
            ]);
        } 
    }
    
}



