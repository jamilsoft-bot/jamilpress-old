
In = "Insert"
Del = "Delete"
Up = "Update"
ret = "Retrive"

User = "User"
post = "post"
com = "Comment"
js = "Js_info"
setting = "Js_setting"

prog = [User,post, com, js, setting]

child = [In,Del,Up,ret]

mylist = ["Post_Id", "Comment_Author", "Content", "Author_email", "Author_link", "Title", "Status",  "Author_Ip"]
f = open("set.php","w")
f.write("<?php\n")
f.write("$Comment = array(\n")
for l in mylist:
    f.write("""\
     '"""+l+"""' => '',
     """)
f.write(");\n")
f.write("$sql = \"INSERT INTO `users`(")
for n in mylist:
   f.write("'"+n+"',")

f.write(")\";")
f.write("VALUES(")
for i in mylist:
    f.write("'\".$"+i+".\"',")
f.write(")\n\n?>")
for j in mylist:
    f.write("$"+j+" =   "+"$Comment['"+j+"'];\n")
f.close()




