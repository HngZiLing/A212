import 'package:flutter/material.dart';

class MainScreen extends StatefulWidget {
  const MainScreen({Key? key}) : super(key: key);

  @override
  State<MainScreen> createState() => MainScreenState();
}

class MainScreenState extends State<MainScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('MyTutor'),
      ),
      drawer: Drawer(
        child: ListView(
          children: [
            const UserAccountsDrawerHeader (
              accountName: Text("H'ng Zi Ling"),
              accountEmail: Text("hngziling@gmail.com"),
              currentAccountPicture: CircleAvatar(
                backgroundImage: NetworkImage(
                  "https://wx1.sinaimg.cn/mw2000/007X7cZpgy1h1akj6hxvdj32802yox6r.jpg"
                  ),
              ),
            ),
            createDrawerItem(
              icon: Icons.money,
              text: 'Payment',
              onTap: () {},
              ),
              createDrawerItem(
              icon: Icons.people,
              text: 'Register',
              onTap: () {},
              ),
              createDrawerItem(
              icon: Icons.shopping_cart,
              text: 'Booking',
              onTap: () {},
              ),
          ]
        )
      ),
    );
  }
  Widget createDrawerItem (
  {required IconData icon, required String text, required GestureTapCallback onTap}
  )
  {
    return ListTile(
      title: Row(
        children: <Widget> [
          Icon(icon), Padding(
            padding: EdgeInsets.only(left:8.0),
            child: Text(text),
          )
        ],),
        onTap: onTap,
    );
  }

}

