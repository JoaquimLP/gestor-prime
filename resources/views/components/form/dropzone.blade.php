<!-- component -->
<div class="bg-white p7 rounded w-full mx-auto">
    <div x-data="dataFileDnD()"
        class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
        <div x-ref="dnd"
            class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
            <input accept="image/jpeg,image/png,application/pdf" type="file" multiple name="{{ $name }}"  class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                @change="addFiles($event)"
                @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                title="" />

            <div class="flex flex-col items-center justify-center py-10 text-center">
                <x-icons.photo />
                <p class="m-0">Anexar documentos.</p>
            </div>
        </div>

        <template x-if="files.length > 0">
            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)" @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                <template x-for="(_, index) in Array.from({ length: files.length })">
                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                        style="padding-top: 100%;" @dragstart="dragstart($event)"
                        @dragend="fileDragging = null"
                        :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                        :data-index="index">
                        <button
                            class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                            type="button" @click="remove(index)">
                            <x-icons.trash />
                        </button>
                        <template
                            x-if="files[index].type.includes('application/') || files[index].type === ''">
                            <x-icons.folder />
                        </template>
                        <template x-if="files[index].type.includes('image/')">
                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                x-bind:src="loadFile(files[index])" />
                        </template>
                        <div
                            class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate"
                                x-text="files[index].name">Loading</span>
                            <span class="text-xs text-gray-900"
                                x-text="humanFileSize(files[index].size)">...</span>
                        </div>

                        <div class="absolute inset-0 z-40 transition-colors duration-300"
                            @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                            :class="{ 'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index }">
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>
