// lazy.cpp : コンソール アプリケーションのエントリ ポイントを定義します。
//

#include "stdafx.h"

#include "D3DX10math.h"


template <class Lhs, class Rhs>
struct Expr;

template <class Lhs>
struct Expr<Lhs, D3DXVECTOR3>
{
	Lhs lhs;
	D3DXVECTOR3 rhs;
	Expr(Lhs lhs_, D3DXVECTOR3 rhs_)
		: lhs(lhs_)
		, rhs(rhs_)
	{
	}
};

template <>
struct Expr<float, D3DXVECTOR3>
{
	float lhs;
	D3DXVECTOR3 rhs;
	typedef D3DXVECTOR3 ResultType;

	Expr(float lhs_, D3DXVECTOR3 rhs_)
		: lhs(lhs_)
		, rhs(rhs_)
	{
	}
};

template <class Lhs, class Rhs>
typename Expr<Lhs, Rhs>::ResultType eval(Expr<Lhs, Rhs> expr)
{
	return eval(expr.lhs) * eval(expr.rhs);
}

float eval(float val)
{
	return val;
}

D3DXVECTOR3 eval(D3DXVECTOR3 val)
{
	return val;
}


int _tmain(int argc, _TCHAR* argv[])
{
//	Expr<float, D3DXVECTOR3> expr(2.f, D3DXVECTOR3(1.f, 1.f, 1.f));
	Expr<float, D3DXVECTOR3> expr(2.f, Expr<float, D3DXVECTOR3>(D3DXVECTOR3(1.f, 1.f, 1.f));

	D3DXVECTOR3 r = eval(expr);
	printf("result:%.2f, %.2f, %.2f\n", r.x, r.y, r.z);

	return 0;
}

