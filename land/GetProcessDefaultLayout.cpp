#define WIN32_LEAN_AND_MEAN
#include <windows.h>
#include <winuser.h>
#include <tchar.h>
#include <winnt.h>
#include <windowsx.h>
#include <stdio.h>

int main()
{
    DWORD dwLayout;
	int z;
	z = GetWindowLong(FindWindow(_T("HHTaskBar"), NULL), GWL_EXSTYLE);


    if ( !GetProcessDefaultLayout(&dwLayout) ) {
        printf("GetProcessDefaultLayout() failed: %lu\n", GetLastError());
        return 1;
    }

    printf("Default layout is %lu\n", dwLayout);
    printf("GetWindowLong(FindWindow(_T(HHTaskBar), NULL), GWL_EXSTYLE) (ld) %ld\n", z);
    printf("GetWindowLong(FindWindow(_T(HHTaskBar), NULL), GWL_EXSTYLE) (lu) %lu\n", z);
    printf("GetWindowLong(FindWindow(_T(HHTaskBar), NULL), GWL_EXSTYLE) (d) %d\n", z);
    return 0;
}
