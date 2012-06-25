// weak_ptr.cpp : コンソール アプリケーションのエントリ ポイントを定義します。
//

#include "stdafx.h"

#include <memory>


inline void Print(std::weak_ptr<int> hoge)
{
	if (std::shared_ptr<int> p = hoge.lock())
	{
		printf("%d\n", *p);
	}
	else
	{
		printf("deleted\n");
	}
}

int _tmain(int argc, _TCHAR* argv[])
{
	std::shared_ptr<int> sptr(new int(99));
	std::weak_ptr<int> wptr(sptr);

	Print(wptr);	// 99
	
	sptr.reset();

	Print(wptr);	// deleted

	try
	{
		std::shared_ptr<int> sptr2(wptr);	// bad_weak_ptr
	}
	catch (std::bad_weak_ptr e)
	{
		printf("std::bad_weak_ptr\n");
	}

	sptr.reset(new int(100));

	Print(wptr);	// これは deleted

	return 0;
}

