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
Route::get('/welcome','HomeController@welcome');

/*TimeSheet*/
Route::get('/createTimeSheet','TimeSheetController@viewCreateTimeSheet');
Route::post('/addTimeSheet','TimeSheetController@addTimeSheet');
//Route::view('/createTimeSheet','StaffController@viewCreateTimeSheet');


/*User*/
Route::get('/register','UsersController@registernewUser');
Route::get('/usersList','UsersController@usersList');
Route::get('/editUser/{id}','UsersController@editUser');
Route::get('/users','UsersController@index')->name('users');
Route::get('getSubDepartments/{id}','UsersController@getSubDepartments');

Route::view('/staffList','staff.staffList');
Route::view('/staffGrades','staff.staffGrades');

Route::view('/timeSheets','timeSheets.timeSheets');
Route::view('/departments','departments.departmentsList');
Route::view('/positions','positions.positionsList');

/*LeaveDays*/
Route::view('/leave','staff.employeeLeaveList');
Route::get('getLeaveDays','LeaveController@getLeavedays');
Route::get('/getRequest','LeaveController@getRequests')->name('getRequest');
Route::get('requestListing','LeaveController@requestListing');
Route::get('requestProfile/{id}','LeaveController@requestProfile');
Route::post('requestProfile/acceptRequest/{id}','LeaveController@acceptRequest');
Route::post('rejectReason/{id}','LeaveController@rejectReason');
Route::get('staffOnLeave','LeaveController@staffOnLeave');
Route::get('getStaffNotWorking','LeaveController@getStaffNotWorking');
Route::get('leaveProfile/{id}','LeaveController@requestProfile');

//Route::view('/employmentTypes','employmentTypes.employmentTypesList');

/*Staff*/
Route::post('/addLeave','StaffController@addLeave');
Route::post('/addStaff','StaffController@addStaff');
Route::get('/getstaff','StaffController@staff');
Route::get('/registerStaff','StaffController@registerStaff');

Route::post('/addUser','Auth\RegisterController@register');
Route::post('/addPosition','PositionsController@create');
Route::get('/getStaffDetail/{id}','StaffController@getStaffDetail');
Route::get('/getStaffDetails/','StaffController@getStaffDetails');
Route::get('/getStaff/','StaffController@getStaff');
Route::get('workingTeam','ShiftController@workingTeam');
Route::get('getShiftTeam','ShiftController@getShiftTeam');

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
Route::get('getDepartment','DepartmentController@getDepartment');

/*Positions*/
Route::get('getPositions','PositionsController@getPositions');

/*Shifts*/
Route::get('/ getShifts','ShiftController@getShifts')->name('getShifts');
Route::get('/ getShiftDetails','ShiftController@getShiftDetails')->name('getShiftDetails');
/*Spreadsheet*/

Route::get('/spreadSheet','TimeSheetController@index');

Route::view('emailTemplate','mails.templateDesign');;

// /*Categories*/
// Route::get('/Categories','Cate')
Route::resource('categories','CategoryController');


Route::view('email','mails.requestAcceptance');


