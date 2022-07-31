import 'dart:async';
import 'package:flutter/material.dart';
import 'package:mytutor_mp/views/loginscreen.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'MyTutor',
      theme: ThemeData(
        primarySwatch: Colors.indigo,
      ),
      home: const MySplashScreen(title: 'Flutter Demo Home Page'),
    );
  }
}

class MySplashScreen extends StatefulWidget {
  const MySplashScreen({Key? key, required String title}) : super(key: key);

  @override
  State<MySplashScreen> createState() => MySplashScreenState();
}

class MySplashScreenState extends State<MySplashScreen> {
  late double screenHeight, screenWidth;
  @override
  void initState() {
    super.initState();
    Timer(
      const Duration (seconds: 3),
      () => Navigator.pushReplacement(
        context, MaterialPageRoute(builder: (content) => const LoginScreen()))
    );
  }

@override
  Widget build(BuildContext context) {
    screenHeight = MediaQuery.of(context).size.height;
    screenWidth = MediaQuery.of(context).size.width;
    return Scaffold(
      body: Stack(
        alignment: Alignment.center,
        children : [
          Container(
            decoration: const BoxDecoration(
              image : DecorationImage(
                image: AssetImage('assets/images/splash.png'),
                fit: BoxFit.cover)
            ),
          ),
          Padding (
            padding : const EdgeInsets.fromLTRB(0,50,0,10),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: const [
                Text("MytuTor", style: TextStyle(fontSize: 40, fontWeight: FontWeight.bold, color: Colors.white,),),
                CircularProgressIndicator(),
                Text("Version 0.1", style: TextStyle(fontSize: 40, fontWeight: FontWeight.bold, color: Colors.white),)
              ]
            )
          )
        ]
      ),
    );
  }
}
