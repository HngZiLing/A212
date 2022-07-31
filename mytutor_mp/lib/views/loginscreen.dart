import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'package:mytutor_mp/views/mainscreen.dart';
import 'package:mytutor_mp/config.dart';
import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';


class LoginScreen extends StatefulWidget {
  const LoginScreen({Key? key}) : super(key: key);

  @override
  State<LoginScreen> createState() => LoginScreenState();
}

class LoginScreenState extends State<LoginScreen> {
  late double screenHeight, screenWidth, ctrwidth;
  bool remember = false;
  TextEditingController input_email = TextEditingController();
  TextEditingController input_password = TextEditingController();
  final formKey = GlobalKey<FormState>();

  @override
  Widget build(BuildContext context) {
    screenHeight = MediaQuery.of(context).size.height;
    screenWidth = MediaQuery.of(context).size.width;

    if(screenWidth >= 800) {ctrwidth = screenWidth / 1.5;}
    if(screenWidth <= 800) {ctrwidth = screenWidth;}
    return Scaffold(
      body: SingleChildScrollView(
        child: Center(
          child: SizedBox(
            width: ctrwidth,
            child: Form(
              key: formKey,
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children : [
                Padding(
                  padding: const EdgeInsets.fromLTRB(32, 32, 32, 32),
                  child: Column (
                    crossAxisAlignment: CrossAxisAlignment.start,
                    mainAxisSize: MainAxisSize.min,
                    children: [
                      SizedBox(
                        height: screenHeight / 2.5,
                        width: screenWidth,
                        child: Image.asset('assets/images/logo.png')
                      ),
                      const Text("Login", style: TextStyle(fontSize: 24),),
                      const SizedBox (height: 10),
                      TextField(
                        controller: input_email,
                        decoration: InputDecoration(
                          hintText: "Email",
                          border:OutlineInputBorder(
                            borderRadius: BorderRadius.circular(5.0)
                          )
                        ),
                        validator: (value) {
                          if(value == null || value.isEmpty) {return 'Please enter valid email';}
                          bool emailValid = RegExp(r"^[a-zA-Z0-9.a-zA-Z0-9.!#$%&'*+-/=?^_`{|}~]+@[a-zA-Z0-9]+\.[a-zA-Z]+").hasMatch(value);
                          if(!emailValid) {return 'Please enter a valid email';}
                          return null;
                        }
                      ),
                      const SizedBox(height: 10,),
                      TextField(
                        controller : input_password,
                        keyboardType: TextInputType.visiblePassword,
                        obscureText: true,
                        decoration: InputDecoration(
                          labelText: "Password",
                          border:OutlineInputBorder(
                            borderRadius: BorderRadius.circular(5.0)
                          )
                        ),
                        validator: (value) {
                          if(value == null || value.isEmpty) {return 'Please enter valid password';}
                          if(value.lenngth < 6) {return 'Password must be at leat 6 characters long';}
                          return null;
                        }
                      ),
                      Row(
                        children: [
                          Checkbox(value: remember, onChanged: onRememberMe),
                          const Text("Remember Me")
                        ],
                      ),
                      SizedBox(
                        width: screenWidth, 
                        height: 50,
                        child: ElevatedButton(child: const Text("Login"), onPressed: loginUser,),
                      )
                    ],
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    )
  );
}

  void onRememberMe(bool? value) {
    setState(() {
      remember = value!;
    });
  }

  void saveRemovePref(bool value) async {
    if(formKey.currentState!.validate()) {formKey.currentState!.save();}
    String email = input_email.text;
    String password = input_password.text;
    SharedPreferences prefs = await SharedPreferences.getInstance();
    if(value) {
      await prefs.setString('email', email);
      await prefs.setString('password', password);
      await prefs.setBool('remember', true);
    } else {
      await prefs.setString('email', '');
      await prefs.setString('password', '');
      await prefs.setBool('remember', false);
    }
  }

  void loginUser() {
    String email = input_email.text;
    String password = input_password.text;
    if (formKey.currentState!.validate()) { formKey.currentState!.save();}
    if (email.isNotEmpty && password.isNotEmpty) {
      http.post(Uri.parse("http://10.31.115.167/mytutor_mp/php/login_user.php"),
      body: {"email": email, "password": password}).then((response){

        var data = jsonDecode(response.body);

        if (response.statusCode == 200 && data['status'] == "success") {
          Fluttertoast.showToast(
            msg: "Success",
            toastLength: Toast.LENGTH_SHORT,
            gravity: ToastGravity.BOTTOM,
            timeInSecForIosWeb: 1,
            fontSize: 16.0
          );
            Navigator.pushReplacement(
            context, MaterialPageRoute(builder: (content) => const MainScreen()));
        } else {
            Fluttertoast.showToast(
            msg: "Failed",
            toastLength: Toast.LENGTH_SHORT,
            gravity: ToastGravity.BOTTOM,
            timeInSecForIosWeb: 1,
            fontSize: 16.0
          );
        }
      });

    }
  }
}