// Copyright (c) 2011 Zeex
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

#ifndef SAMPGDK_FAKEAMX_H
#define SAMPGDK_FAKEAMX_H

#include <sampgdk/amx.h>
#include <vector>


class FakeAmx {
public:
	static const size_t INITIAL_HEAP_SIZE = 1024;

	~FakeAmx();

	static FakeAmx &GetInstance();

	AMX *amx() const;

	cell Push(size_t cells);
	cell Push(const char *s);

	void Get(cell address, cell &value) const;
	void Get(cell address, char *value, size_t size) const;

	void Pop(cell address);

	cell CallNative(AMX_NATIVE native, cell *params);
	bool CallBooleanNative(AMX_NATIVE native, cell *params);

private:
	FakeAmx();
	FakeAmx(const FakeAmx &rhs);

	AMX amx_;
	AMX_HEADER hdr_;

	std::vector<cell> heap_;
};

class FakeAmxHeapObject {
public:
	FakeAmxHeapObject();
	FakeAmxHeapObject(size_t cells);
	FakeAmxHeapObject(const char *s);
	~FakeAmxHeapObject();

	cell address() const;
	size_t size() const;

	cell  Get() const;
	float GetAsFloat() const;
	void  GetAsString(char *s, size_t size) const;

private:
	size_t size_;
	cell address_;
};

#endif // !SAMPGDK_FAKEAMX

