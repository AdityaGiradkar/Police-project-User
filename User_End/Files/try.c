#include<stdio.h>

struct poly
{
    int coef, expo;
};

struct poly m1[10],m2[10],m3[10],m4[10];

int getdata(struct poly p[10])
{
    int i,t;

    printf("Enter  no. of terms : ");
    scanf("%d",&t);

    printf("Enter terms in descending order of exponent\n");
    for(i=0;i<t;i++)
    {
        printf("Enter coefficient and exponent: ");
        scanf("%d %d",&p[i].coef, &p[i].expo);
    }

    return t;
}

int mulpoly(struct poly d1[10],struct poly d2[10],int x,int y,struct poly d3[10],struct poly d4[10])
{
    int i=0,j=0,k=0,f,t=0,q;
    for(i=0;i<y;i++)
    {
        for(j=0;j<x;j++)
        {
            d3[k].coef = (d2[i].coef)*(d1[j].coef);
            d3[k].expo = (d2[i].expo)+(d1[j].expo);
            f=0;
            for(q=0;q<t;q++)
            {
                if(d4[q].expo == d3[k].expo)
                {
                    d4[q].coef=d4[q].coef+d3[k].coef;
                    f=1;
                }
            }

            if(f==0)
            {
                d4[t].coef=d3[k].coef;
                d4[t].expo=d3[k].expo;
                t++;
            }
            k++;
        }
    }

    return t;
}

void display(struct poly p[10],int x)
{
    int i;
    for(i=0;i<x;i++)
    {
        if(p[i].coef!=0)
            printf(" %d(x^%d) ",p[i].coef, p[i].expo);
            if(i+1<x)
                printf("+");
    }
    printf("\n\n");
}

int main()
{
    int t1,t2,t3;

    t1=getdata(m1);
    printf("First polynomial is : \n");
    display(m1,t1);

    t2=getdata(m2);
    printf("Second polynomial is : \n");
    display(m2,t2);

    t3=mulpoly(m1,m2,t1,t2,m3,m4);
    printf("Resulting polynomial is : \n");
    display(m4,t3);
}
