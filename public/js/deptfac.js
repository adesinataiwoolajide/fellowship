// this script jus generates dynamic html, nothing more

var Faculty = {
    'Agriculture': [
        'Animal Science', 'Agricultural Economics', 'Agronomy', 
        'Forest Resources Management'
    ],
    'Arts': [
       'Music', 'Religious Studies', 'Islamic Studies', 'Communication and Language Arts',
        'European Studies', 'History', 'Theatre Arts', 
        'Philosophy'
    ],
    'College of Medicine': [
        'Human Nutrition', 'Obsterics and Gynaecology', 'Ophthamology', 'Paediatrics', 'Physiotherapy', 
        'Radiotherapy', 'Surgery', 'Biochemistry', 'Epidemiology', 'Medical Statistics and Environmental Health (EMSEH)',
        'Health Policy and Management', 'Health Promotion and Education', 'Advanced Medical Research and Training',
        'Medicine', 'Obstetrics and Gynaecology', 'Physiology', 'Preventive Medicine and Primary Care',
        'Psychiatry'
    ],
    'Education': [
        'Teacher Education', 'Adult Education', 'Guidance and Counselling', 
        'Human Kinetics and Health Education'
    ],
    'Pharmacy': [
        'Pharmaceutics and Industrial Pharmacy'
    ],
    'Science': [
       'Botany', 'Zoology', 'Computer Science', 'Statistics', 
       'Mathematics', 'Chemistry', 'Physics', 'Microbiology', 'Geology',

    ],

    'Social Sciences': [
        'Psychology', 'Economics', 'Geography', 'Sociology',    
    ],

    'Technology': [
        'Electrical and Electronic Engineering', 'Mechanical Engineering',
        'Food Technology', 'Petroleum Engineering', 
        'industrial and Production Engineering',
 
    ],
    'Law': [
        'Law'
    ],

    'Veterinary Medicine': [
        'Veterinary Physiology', 'Biochemistry and Pharmacology',
 
     ],
    
};




function useFac(param){
var parentE = document.getElementById('deptName');
console.log(param);
console.log(parentE);
var emptOptn
 = '<option value="" id="optG">-- Select Dept --</option>';
parentE.innerHTML = emptOptn;
for (var i = 0; i < param.length; i++) {
     var elem = '<option value="' + param[i] + '">' + param[i] + '</option>';
                $(elem).insertBefore('#optG');
               // console.log(parentE);
}
console.log(document.getElementById('deptName'));
}
function useSelectedItem(param){
    console.log(param);
    var parentE = document.getElementById('deptName');
    console.log(parentE);
    // console.log(param.value);
    parentE.innerHTML = '';
    useFac(Faculty[param.value]);
}


