#include<stdio.h>
#include<stdlib.h>
struct student  {
int rollno;
char name[50];
int marks;



}s[10];
int main()
{int sno;
printf("\nEnter the number of students");
scanf("%d",&sno);
while(1)
{

int n;
char r;

printf("\nEnter your choice");
printf("\n1.Add\n2.Modify\n3.Display ");
scanf("%d",&n);
switch(n)

{
case 1:
int i;

for(i=0;i<sno;i++){
  printf("\nEnter the roll no of student");
  scanf("%d",&s[i].rollno);
  printf("\n Enter the name");
  scanf("%s",s[i].name);
  printf("\nEnter the marks");
  scanf("%d",&s[i].marks);





}
break;
case 2:

int rno;
printf("\n Enter the roll no student to modify");
scanf("%d",&rno);
for(i=0;i<sno;i++)
{
if(s[i].rollno==rno){
printf("\nEnter the roll no of student");
  scanf("%d",&s[i].rollno);
  printf("\n eEnter the name");
  scanf("%s",s[i].name);
  printf("\nEnter the marks");
  scanf("%d",&s[i].marks);




}






}



break;
case 3:
printf("\n Name\t Rollno\t Marks");
for(i=0;i<sno;i++)
{
printf("name:");
printf("%s",s[i].name);
printf("\nRollno:%d",s[i].rollno);
printf("\nMarks:%d",s[i].marks);




}


break;





}












}

}

