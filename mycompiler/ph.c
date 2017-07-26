#include <stdio.h>
main()
{
    float basic_sal, da, hra, pf, gross_sal, net_sal;
    printf("\nEnter basic salary of the employee: Rs. ");
    scanf("%f", &basic_sal);
    da = (basic_sal * 25)/100;
    hra = (basic_sal * 15)/100;
    gross_sal = basic_sal + da + hra;   
    pf = (gross_sal * 10)/100;
    net_sal = gross_sal - pf;
    printf("\n\nNet Salary: Rs. %.2f", net_sal);

} 