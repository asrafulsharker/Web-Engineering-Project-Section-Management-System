<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<script>
    // Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAg4WxxfM8tfAldHqGaEP67ZTOTlZwZHvo",
  authDomain: "peony-classroom.firebaseapp.com",
  projectId: "peony-classroom",
  storageBucket: "peony-classroom.appspot.com",
  messagingSenderId: "820484408878",
  appId: "1:820484408878:web:081a75dd5879e0659b81bf",
  measurementId: "G-4PS6PVZM0V"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
</script>
</body>
</html>