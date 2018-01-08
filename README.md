# DHBW pedigree project

This project was build with my team at the DHBW Karlsruhe University in Germany.

We had to cope with various problems such as the presentation of the various relationship constellations and the different input of the persons for the correct assignment of the relationships.

### Give it a try at [http://dhbw-stammbaum.de](http://dhbw-stammbaum.de)

Apart from normal input fields, the data can also be uploaded serially via an **XML file**, which saves a lot of work from entering the individual persons via the frontend.

The markup should look like this if you want to upload your pedigree with an xml file.
For more instructions visit the [HowTo](http://dhbw-stammbaum.de/howto.html) section.

```xml
<?xml version="1.0"?>
<?xml-stylesheet type="text/xsl" href="../Trees.xsl"?>
<Tree>    
    <Person ID="1" FirstName="Vater"  LastName="Müller" Gender="male" ChildOf="0" MarriedTo="" Birthday="2002-09-25" Death="2002-09-25"/>
    <Person ID="2" FirstName="Mutter" LastName="Müller" Gender="female" ChildOf="" MarriedTo="1" Birthday="2002-09-25"/>
    <Person ID="3" FirstName="Kind" LastName="Müller" Gender="male" ChildOf="2" MarriedTo="" Birthday="2002-09-25"/>
</Tree>
```

![Screenshot of www.dhbw-stammbaum.de](https://github.com/felixhaeberle/dhbw-family-tree/blob/master/screen.png)
