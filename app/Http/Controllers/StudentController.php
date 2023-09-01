<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StudentCreateRequest;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $student = Student::with('class')
        ->where('name','LIKE','%'.$keyword.'%')
        ->orWhere('nobp','LIKE','%'.$keyword.'%')
        ->orWhere('gender',$keyword)
        ->orWhereHas('class',function($query)use($keyword){
            $query->where('name','LIKE','%'.$keyword.'%');
        })
        ->paginate(5);
        return view('student' , ['studentList' => $student]);
        

        // PERBANDINGAN COLLECTION DENGAN FUNGSI PHP BIASA
        // $nilai=[9,8,7,6,5,3,2,5];
        
        // penjelasan collection
        // 1. contains : cek apakah sebuah array memiliki sesuatu
            // $aaa = collect($nilai)->contains(function($value){
            //     return $value < 6;
            // });
            // dd($aaa);

        // 2. diff : bisa mendapatkan data data dengan array yang di bandingkan
            // $restaurantA = ["Burger", "Siomay","Pizza","Spaghetti","Marakoni",];
            // $restaurantB = ["Pizza", "martabak","Sayur","Pecel lele","Bakso",];
            
            // $menuRestoA = collect($restaurantA)->diff($restaurantB);
            // $menuRestoB = collect($restaurantB)->diff($restaurantA);
            // dd($menuRestoB);

        // 3. method filter : menyaring 
            // $nilai=[9,8,7,6,5,3,2,5];
            // $aaa = collect($nilai)->filter(function($value){
            //     return $value > 7;
            // })->all();
            // dd($aaa);

        // 4. Method pluck
            // $biodata =[
            //     ['nama'=> 'budi','umur'=>17],
            //     ['nama'=> 'ani','umur'=>16],
            //     ['nama'=> 'siti','umur'=>17],
            //     ['nama'=> 'rudi','umur'=>20],
            // ];
            
            // $aaa = collect($biodata)->pluck('umur')->all();
            // dd($aaa);

        // 5. Method Map
            // $nilai =[9,6,7,3,2,7];
            // kita akan mencari hasil dari nilai dikali 2
            // php biasa
                // $nilaiKaliDua =[];
                // foreach ($nilai as $value){
                //     array_push($nilaiKaliDua, $value * 2);
                // }

                // dd($nilaiKaliDua);\

            // map laravel
            // $aaa = collect($nilai)->map(function($value){
            //     return $value *2;
            // })->all();
            // dd($aaa);

        // cara php biasa
        // 1. hitung jumlah nilai
        // 2. hitung berapa banyak nilai
        // 3. hitung nilai rata rata

        // $countNilai = count($nilai);
        // $totalNilai = array_sum($nilai);
        // $nilaiRataRata = $totalNilai / $countNilai;
        // dd($nilaiRataRata);

        //collection laravel
        // 1.hitung nilai rata rata nilai
        // $nilaiRataRata = collect($nilai)->avg();
        // dd($nilaiRataRata);


        // ____________________________________________________________________________
        // eloquent orm (rekomendasi)
        // query builder
        // raw query
        // $student =Student::all();
        // return view('student',['studentList'=> $student]);

        // query builder
        // $student = DB::table('students')->get();
        // dd($student);

        // UPDATE DATA MENGGUNAKAN QUERY  BUILDER
        // DB::table('students')->where('id',5)->update([
        //     'name'=> 'zaki anshari',
        //     'class_id' => '3'
        // ]);
        
        // DELETE DATA MENGGUNAKAN QUERY BUILDER
        // DB::table('students')->where('id',5)->delete();

        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nobp' => '2110023',
        //     'class_id' => '1',
        // ]);


        // query eloquent
        // $student = Student::all();
        // dd($student);

        // Student::create([
        //     'name' => ' builder',
        //     'gender' => 'P',
        //     'nobp' => '2110027',
        //     'class_id' => '2',
        // ]);

        // UPDATE DATA MENGGUNAKAN ELOQUENT
        // Student::find(6)->update([
        //     'name'=>'zaki1',
        //     'class_id' => '1'
        // ]);

        // DELETE DATA MENGGUNAKAN ELOQUENT
        // student::find(6)->delete();
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher','extracurriculars'])
        ->findOrFail($id);
        return view('student-detail' , ['student' => $student]);
    }

    public function create()
    {
        $class = Classroom::select('id','name')->get();
        return view('student-add' , ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        $newName= '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'.'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $student = Student::create($request->all());

        if($student){
            Session::flash('status','success');
            Session::flash('message','Data Berhasil Di Simpan');
        }
        
        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')
        ->findOrFail($id);
        $class = Classroom::where('id', '!=',$student->class_id)->get(['id','name']);
        return view('student-edit',['student'=>$student,'class'=>$class]);

    }

    public function update(Request $request,$id)
    {
        $student =Student::findOrFail($id);
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nobp = $request->nobp;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->update ($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete',['student' => $student]);
    }

    public function destroy($id)
    {
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent-> delete();

        if($deletedStudent){
            Session::flash('status','success');
            Session::flash('message','Data Berhasil Di Hapus');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['student' => $deletedStudent]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id',$id)->restore();

        if($deletedStudent){
            Session::flash('status','success');
            Session::flash('message','Data Berhasil Di Kembalikan');
        }

        return redirect('/students');
    }

}
