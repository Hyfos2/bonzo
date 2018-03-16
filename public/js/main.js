Vue.config.devtools = true;
const ERRORS = {

// Users
     nameField:'The name field is required',
    departmentNameField:'The department name field is required',
    positionNameField:'The position name field is required',
    surnameField :'The surname field is required',
    emailField: 'The email field is required',
    positionField: 'The position field is required',
    gradeField: 'The grade field is required',
    gdeNmbeField:'The grade field is required',
     salaryField:'The salary field is required',
    
    dobField: 'Pick your date of birth',
    dateOfEmploymentField:'Pick a date of recruitment',
    employmentTypeIdField:'The employment type is required',
    employeeNumberField:'The employee number is required',
    departmentIdField:'The department field is required',
    subDepartmentField:'The sub department field is required',
      roleField:'The role field is required',
    genderField:'The gender field is required',
   
   
    typeIdField:'Fill in the product type',
    specificationField:'Fill in the product specification',
    orderedDateField:'Fill in the product ordered date',
    receivedDateField:'Fill in the product received date',
    priceField:'Fill in the product price',
    unitField:'Fill in the product unit',
    recipeintNameField:'Fill in the Recipeint name',
    confirmPwdField:'Fill in the Password',
    productNameField:'Fill in the Product Name',
    quantityField:'Fill in the Product Quantity',
    regionField: 'Fill in the region',
   // positionField:'Fill in the position',
    physicalAddressField:'Fill in the Physical Address',
    cellphoneField:'Fill in the cellphone'
};

if (document.querySelector('#registrationForm')) {
 var vm =  new Vue({
    el: "#registrationForm",
    data: {
        name: '',
        surname: '',
        email: '',
        positionId: '',
          departmentId: '',
           roleId: '',
        subDepartmentId: '',
        categories:[],
        gradeId: '',
          isHidden: false,
        submition: false
    },
    computed: {
        wrongName:function() {
            if(this.name === '') {
            this.nameFB = ERRORS.nameField;
            return true
            }
            return false
        },
        wrongSurname:function() {  if(this.surname === '') {
            this.surnameFB = ERRORS.surnameField;
            return true
        }
            return false },
        wrongEmail:function() {  if(this.email === '') {
            this.emailFB = ERRORS.emailField;
            return true
        }
            return false },
              wrongDpt:function() {  if(this.departmentId === '') {
            this.dptFB = ERRORS.departmentIdField;
            return true
        }
            return false },
        wrongSubDpt:function() {  if(this.subDepartmentId === '') {
            this.subDptFB = ERRORS.subDepartmentField;
            return true
        }
            return false },
         wrongPositionId:function() { if(this.positionId === '') {
            this.positionFB = ERRORS.positionField;
            return true
        }
            return false },
        wrongGradeId:function() {  if(this.gradeId === '') {
            this.gradeFB = ERRORS.gradeField;
            return true
        }
            return false },
        wrongRoleId:function() {  if(this.roleId === '') {
            this.roleFB = ERRORS.roleField;
            return true
        }
            return false }
    },
    methods: {
        registerUser:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongName || this.wrongSurname || this.wrongEmail ||  this. wrongPositionId || this.wrongGradeId || this.wrongDpt || this.wrongRoleId  || this.errors.any())
                {
                    event.preventDefault();
                } 
            else {
                   return true;
                }
        },
        getSubDepartments:function()
        {
            var id = this.departmentId;
            $('#subDepartmentId').empty();
            axios.get('getSubDepartments/'+id)
                .then(function (response){
                    $('#subDepartmentId').append("<option  selected disabled>Select Sub Department</option>");
                    response.data.forEach(function (value, key) {
                        $('#subDepartmentId').prepend("<option  value=" + value.id + ">" + value.name + "</option>");
                    });
                })
                .catch(function(error){

               });
        },
       
    watch:
            {
                email:function()
                {
                    let str = this.email;
                    
                    if(str.length > 0)
                        return    this.isHidden = true;
                  
                }

            }
    }
})
}

if (document.querySelector('#staffRegistrationForm')) {
new Vue({
    el: "#staffRegistrationForm",
       data: {
         name: '',
        surname: '',
        dob: '',
        gender: '',
        dateOfEmployment: '',
        employmentTypeId:'',
        employeeNumber: '',
        departmentId: '',
        positionId: '',
        gradeId: '',
        submition: false
    },
    computed: {
        wrongName:function() {
            if(this.name === '') {
            this.nameFB = ERRORS.nameField;
            return true
            }
            return false
        },
        wrongSurname:function() {  if(this.surname === '') {
            this.surnameFB = ERRORS.surnameField;
            return true
        }
            return false },
        wrongDob:function() {  if(this.dob === '') {
            this.dobFB = ERRORS.dobField;
            return true
        }
            return false },
            wrongGender:function() {  if(this.gender === '') {
            this.gFB = ERRORS.genderField;
            return true
        }
            return false },
               wrongdateOfEmploment:function() {  if(this.dateOfEmployment === '') {
            this.doeFB = ERRORS.dateOfEmploymentField;
            return true
        }
            return false },
               wrongEmploymentTypeId:function() {  if(this.employmentTypeId === '') {
            this.etiFB = ERRORS.employmentTypeIdField;
            return true
        }
            return false },
               wrongEmployeeNumber:function() {  if(this.employeeNumber === '') {
            this.enumFB = ERRORS.employeeNumberField;
            return true
        }
            return false },
               wrongDpt:function() {  if(this.departmentId === '') {
            this.dptFB = ERRORS.departmentIdField;
            return true
        }
            return false },

               wrongPstn:function() {  if(this.positionId === '') {
            this.pstnFB = ERRORS.positionField;
            return true
        }
            return false },

               wrongGrade:function() {  if(this.gradeId === '') {
            this.gradeFB = ERRORS.gradeField;
            return true
        }
            return false },


    },
    methods: {
        validStaffForm:function(event) {
            this.submition = true;
              this.$validator.validateAll();

            if(this.wrongName || this.wrongSurname || this.wrongDob  || this.wrongdateOfEmploment  || this.wrongEmploymentTypeId  || this.wrongEmployeeNumber  || this.wrongDpt || this.wrongPstn || this.wrongGrade ||   this.errors.any());
               
                {
                     event.preventDefault()

                }
        }


    }

});
}

if (document.querySelector('#gradeForm')) {
   new Vue({
    el: "#gradeForm",
    data: {
        grade: '',
        salary: '',
        isHidden: false,
        submition: false
    },
    computed: {
        wrongGrade:function()
        {  if(this.grade === '')
                    {
                        this.gradeFB = ERRORS.gdeNmbeField;
                        return true
                    }
            return false },

        wrongSalary:function() {  if(this.salary === '')
                    {
                        this.salaryFB = ERRORS.salaryField;
                        return true
                    }
            return false }


    },
    methods: {
        addGrade:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongGrade || this.wrongSalary ||this.errors.any())
                event.preventDefault();
            else {
                    return true;
                }
        }


    },
       watch:
           {
               grade:function()
               {
                   let str = this.grade;

                   if(str.length > 0)
                       return    this.isHidden = true;

               }

           }
})
}

if (document.querySelector('#addProductTypeForm')) {
   new Vue({
    el: "#addProductTypeForm",
    data: {
        name: '',
        submition: false
    },
    computed: {
        wrongName:function() {  if(this.name === '') {
            this.nameFB = ERRORS.productTypeNameField;
            return true
        }
            return false }
    },
    methods: {
        productTypeForm:function(event) {
            this.submition = true;
            if(this.wrongName)
                event.preventDefault();
            else {
                return  true;
                }
        }

    }
})
}

if (document.querySelector('#updateForm')) {
   new Vue({
    el: "#updateForm",
    data: {
        regionId:'',
        positionId:'',
        physicalAddress:'',
        cellphone:'',
        submition: false
    },
    computed: {
        wrongRegion:function() {  if(this.regionId === '') {
            this.regionFB = ERRORS.regionField;
            return true
        }
            return false },

            wrongPosition:function() {  if(this.positionId === '') {
            this.positionFB = ERRORS.positionField;
            return true
        }
            return false },
            wrongphysicalAddress:function() {  if(this.physicalAddress === '') {
            this.physicalAddressFB = ERRORS.physicalAddressField;
            return true
        }
            return false },
            wrongCellphone:function() {  if(this.cellphone === '') {
            this.cellphoneFB = ERRORS.cellphoneField;
            return true
        }
            return false }
    },
    methods: {
        updateProfileForm:function(event) {
            this.submition = true;
            if(this.wrongRegion || this.wrongPosition || this.wrongphysicalAddress || this.wrongCellphone)
            {
             event.preventDefault();
            }
            else {
                return  true;
                }
        }

    }
})
}

if (document.querySelector('#hodAction')) {
    var recordID = document.getElementById('recordId').value;
    var a = document.getElementById("snackbar");
    var b = document.getElementById("successBar");
    var c = document.getElementById("errorMessage");
    var count =0;
   new Vue({
    el: "#hodAction",
    methods: {
        acceptRequest:function() 
        {
           
            a.className = "show";
                         setTimeout(function(){ a.className = a.className.replace("show", ""); }, 2000);
            axios.post('acceptRequest/'+recordID)
                        .then(function (response) {
                        if(response.status ===200 && response.statusText ==="OK")
                         {

                             b.className = "show";
                         setTimeout(function(){ b.className = b.className.replace("show", ""); }, 3000);


                         }

                            console.log(response);
                            })

                        .catch(function (error) {
                            if(error.status ===500)
                         {

                             c.className = "show";
                         setTimeout(function(){ c.className = c.className.replace("show", ""); }, 3000);


                         }                            
                                            });

           
        }

    }
})
}

if (document.querySelector('#addDepartmentForm')) {
   new Vue({
    el: "#addDepartmentForm",
    data: {
       
        name: '',
        isHidden: false,
        submition: false
    },
    computed: {
        wrongDepartment:function()
        {  if(this.name === '')
                    {
                        this.nameFB = ERRORS.departmentNameField;
                        return true
                    }
            return false }

    },
    methods: {
        addDepartment:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongDepartment ||this.errors.any())
                event.preventDefault();
            else {
                    return true;
                }
        }


    },
       watch:
           {
               name:function()
               {
                   let str = this.name;

                   if(str.length > 0)
                       return    this.isHidden = true;

               }

           }
})
}

if (document.querySelector('#updateDepartmentForm')) {
    new Vue({
        el: "#updateDepartmentForm",
        data: {

            name: '',
            isHidden: false,
            submition: false
        },
        computed: {
            wrongDepartment:function()
            {  if(this.name === '')
            {
                this.nameFB = ERRORS.departmentNameField;
                return true
            }
                return false }

        },
        methods: {
            updateDepartment:function(event) {
                this.submition = true;
                this.$validator.validateAll();
                if(this.wrongDepartment ||this.errors.any())
                    event.preventDefault();
                else {
                    return true;
                }
            }


        },
        watch:
            {
                name:function()
                {
                    let str = this.name;

                    if(str.length > 0)
                        return    this.isHidden = true;

                }

            }
    })
}

if (document.querySelector('#addPositionForm')) {
   new Vue({
    el: "#addPositionForm",
    data: {
       
        name: '',
        isHidden: false,
        submition: false
    },
    computed: {
        wrongPosition:function()
        {  if(this.name === '')
                    {
                        this.nameFB = ERRORS.positionNameField;
                        return true
                    }
            return false }

    },
    methods: {
        addPosition:function(event) {
            this.submition = true;
            this.$validator.validateAll();
            if(this.wrongPosition ||this.errors.any())
                event.preventDefault();
            else {
                    return true;
                }
        }


    },
       watch:
           {
               name:function()
               {
                   let str = this.name;

                   if(str.length > 0)
                       return    this.isHidden = true;

               }

           }
})
}

if (document.querySelector('#updateGradeForm')) {
    new Vue({
        el: "#updateGradeForm",
        data: {

            salary: '',
            grade:'',
            isHidden: false,
            submition: false
        },
        computed: {
            wrongUpdateGrade:function()
            {  if(this.grade === '')
            {
                this.gradeFB = ERRORS.gradeField;
                return true
            }
                return false },
                 wrongUpdateSalary:function()
            {  if(this.salary === '')
            {
                this.salaryFB = ERRORS.salaryField;
                return true
            }
                return false }


        },
        methods: {
            updateGrade:function(event) {
                this.submition = true;
                this.$validator.validateAll();
                if(this.wrongUpdateSalary  || this.wrongUpdateGrade ||this.errors.any())
                    event.preventDefault();
                else {
                    return true;
                }
            }


        },
        watch:
            {
                 grade:function()
                {
                    let str = this.grade;

                    if(str.length > 0)
                        return    this.isHidden = true;

                }

            }
    })
}


if (document.querySelector('#addCatForm')) {
    new Vue({
        el: "#addCatForm",
        data: {

            departmentId: '',
            name:'',
            isHidden: false,
            submition: false
        },
        computed: {
            wrongDpt:function()
            {  if(this.departmentId === '')
            {
                this.dptFB = ERRORS.departmentNameField;
                return true
            }
                return false },
                 wrongCatName:function()
            {  if(this.name === '')
            {
                this.catNameFB = ERRORS.subDepartmentField;
                return true
            }
                return false }


        },
        methods: {
            addCat:function(event) {
                this.submition = true;
                this.$validator.validateAll();
                if(this.wrongDpt  || this.wrongCatName ||this.errors.any())
                    event.preventDefault();
                else {
                    return true;
                }
            }


        }
    })
}





// if (document.querySelector('#rejectReasonForm')) {
//     // var recordId = document.getElementById('recordId').value;
//     // var x = document.getElementById("snackbar");
//     // var y = document.getElementById("successBar");
//     // var z = document.getElementById("error");
//     var count =0;
//    new Vue({
//     el: "#rejectReasonForm",
//     methods: {
//         rejectReason:function()
//         {
//              axios.post('rejectReason/'+recordId)
//                         .then(function (response) {

//                         if( response.status ==200 && response.statusText =="OK")
//                          {

//                          //     y.className = "show";
//                          // setTimeout(function(){ y.className = y.className.replace("show", ""); }, 4000);
//                         // console.timeEnd(y);

//                          }

//                             console.log(response);
//                         })

//                         .catch(function (error) {
                            
//                                             });


//         }

//     }
// })
// }





