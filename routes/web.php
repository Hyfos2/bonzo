<?php


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/site/login',
[  

	'uses'=>'loginController@login',
	'as'  =>'app.login'
]);

Route::get('/welcome','HomeController@welcome')->middleware('auth');
Route::view('/register','users.register');
Route::view('/usersList','users.userActivities');
Route::view('/staffList','staff.staffList');

Route::view('/staffGrades','staff.staffGrades');
Route::view('/createTimeSheet','timeSheets.createTimeSheet');
Route::view('/timeSheets','timeSheets.timeSheets');
Route::view('/departments','departments.departmentsList');
Route::view('/positions','positions.positionsList');
/*LeaveDays*/
Route::view('/leave','staff.employeeLeaveList');
Route::get('getLeaveDays','LeaveController@getLeavedays');

//Route::view('/employmentTypes','employmentTypes.employmentTypesList');

/*Staff*/
Route::post('/addLeave','StaffController@addLeave');

Route::get('/registerStaff','StaffController@registerStaff');
Route::get('/users','UsersController@index')->name('users');
Route::post('/addUser','Auth\RegisterController@register');
Route::post('/addStaff','StaffController@addStaff');
Route::post('/addTimeSheet','StaffController@addTimeSheet');
Route::get('/getstaff','StaffController@staff');
Route::post('/addPosition','PositionsController@create');

/*Grades*/
Route::get('/getGrades','GradesController@getGrades');
Route::post('addGrade','GradesController@addGrade');
Route::get('workingHours','ShiftController@workingHours');
Route::post('/addShift','ShiftController@addShift');
Route::get('/allocateShifts','ShiftController@allocateShifts');
Route::post('/allocate','ShiftController@allocate');


/*Employment Type*/

Route::get('/employmentGroup','EmploymentTypeController@index');
Route::post('/addEmploymentType','EmploymentTypeController@add');
Route::get('/getTypes','EmploymentTypeController@getTypes');

/*Department*/
Route::post('addDepartment','DepartmentController@addDepartment');














