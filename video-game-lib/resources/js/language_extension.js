import i18next from 'i18next';

i18next.init({
    debug: true,
    lng: 'en',
    ressources: {
        en:{
            "Search":"Search",
            "News":"News",
            "Login":"Login",
            "Strategy": "Strategy",
            "Driving&Racing": "Driving&Racing",
            "Action":"Action",
            "Shooting":"Shooting",
            "Thinking":"Thinking",
            "Back":"Back",
            "Continue":"Continue",
            "Please Enter Login Information here":"Please Enter Login Information here",
            "Username":"Username",
            "Password":"Password",
            "Dont have an Account, register here!":"Dont have an Account, register here!"
            "Create Account":"Create Account",
            "Registration":"Registration",
            "Please Enter Name-Information here":"Please Enter Name-Information here",
            "First Name":"First Name",
            "Last Name":"Last Name",
            "Day":"Day",
            "Month":"Month",
            "Year":"Year",
            "Primary Email":"Primary Email",
            "LOGIN COMPLETE":"LOGIN COMPLETE",
            "REGISTRATION COMPLETE":"REGISTRATION COMPLETE"
        },
        dk:{
            "Search":"Søg",
            "News":"Nyheder",
            "Login":"Login",
            "Strategy": "Strategi",
            "Driving&Racing": "Køre/Racer",
            "Action":"Aktion",
            "Shooting":"Skyderi",
            "Thinking":"Tanker",
            "Back":"Tilbage",
            "Continue":"Videre",
            "Please Enter Login Information here":"Venligst indtast Login-Information",
            "Username":"Brugernavn",
            "Password":"Adgangskode",
            "Dont have an Account, register here!":"Har du ikke en Konto, registrer her!"
            "Create Account":"Lav en Konto",
            "Registration":"Registrering",
            "Please Enter Name-Information here":"Venligst indtast Navn-Information her",
            "First Name":"Fornavn",
            "Last Name":"Efternavn",
            "Day":"Dag",
            "Month":"Måned",
            "Year":"År",
            "Primary Email":"Primære Email",
            "LOGIN COMPLETE":"LOGIN UDFØRT",
            "REGISTRATION COMPLETE":"REGISTRERING UDFØRT"
        }
    },
    lng: document.querySelector('html').lang,
    fallbackLng: 'en',
    detection:{
        order: ['htmlTag','cookie','localStorage','path','subdomain'],
        caches: ['cookie'],
    }
})

console.log(i18next.t('unknown'));
