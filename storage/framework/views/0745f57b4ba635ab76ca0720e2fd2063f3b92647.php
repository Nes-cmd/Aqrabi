<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php echo e(config('request-docs.document_name')); ?></title>
      <meta name="description" content="Laravel Request Docs">
      <meta name="keywords" content="">
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
      <script src="https://unpkg.com/vue-prism-editor"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/vue-prism-editor/dist/prismeditor.min.css" />

      <script src="https://unpkg.com/prismjs/prism.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/prismjs/themes/prism-tomorrow.css" />

      <script src="https://unpkg.com/faker@5.5.3/dist/faker.min.js" referrerpolicy="no-referrer"></script>
      <script src="https://unpkg.com/string-similarity@4.0.2/umd/string-similarity.min.js" referrerpolicy="no-referrer"></script>

      <script src="https://unpkg.com/vue-markdown@2.2.4/dist/vue-markdown.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sql-formatter/3.1.0/sql-formatter.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="<?php echo e(asset('./vendor/request-docs/dist/app.js')); ?>"></script>
      <style>
        [v-cloak] {
            display: none;
        }
        a {
            color: #3f3398;
        }

        .my-prism-editor {
            /* you must provide font-family font-size line-height. Example:*/
            font-family: Fira code, Fira Mono, Consolas, Menlo, Courier, monospace;
            font-size: 12px;
            line-height: 1.25;
            padding: 5px;
        }

        /* optional class for removing the outline */
        .prism-editor__textarea:focus {
            outline: none;
        }
        .dropdown{
            position: relative;
            width: 100%;
        }
        .dropdown-input, .dropdown-selected{
            width: 100%;
            font-size:14px;
            padding: 10px 16px;
            border: 1px solid transparent;
            background: #edf2f7;
            outline: none;
            border-radius: 8px;
        }
        .dropdown-input:focus, .dropdown-selected:hover{
            background: #fff;
            border-color: #e2e8f0;
        }
        .dropdown-input::placeholder{
            opacity: 0.7;
        }
        .dropdown-selected{
            cursor: pointer;
        }
        .dropdown-list{
            z-index: 9999;
            position: absolute;
            width: 100%;
            max-height: 500px;
            margin-top: 4px;
            overflow-y: auto;
            background: #ffffff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }
        .dropdown-item{
            display: flex;
            width: 100%;
            padding: 2px 6px;
            cursor: pointer;
            font-size: 12px;
        }
        .dropdown-item:hover{
            background: #edf2f7;
        }
      </style>
   </head>
   <body class="bg-gray-100 tracking-wide bg-gray-200">

        <nav class="bg-white py-2 ">
            <div class="container px-4 md:flex md:items-center">
                <div class="flex justify-between items-center">
                    <a href="<?php echo e(config('request-docs.url')); ?>" class="font-bold text-xl text-indigo-600"><?php echo e(config('request-docs.document_name')); ?></a>
                </div>
                <div class="flex justify-between items-center pl-2">
                    |
                </div>
                <div class="flex justify-between items-center pl-2">
                    <a href="<?php echo e(config('request-docs.url')); ?>?openapi=true" class="hover:bg-red-600 bg-red-500 text-white pl-5 pr-5 border-transparent shadow-inner border-2 rounded">
                        Export to Postman (Open API <?php echo e(config('request-docs.open_api.version', '3.0.0')); ?>)
                    </a>
                </div>
            </div>
        </nav>
      <div id="app" v-cloak class="w-full flex lg:pt-10">
         <aside class="text-sm ml-1.5 text-grey-darkest break-all bg-gray-200 pl-2 h-screen sticky top-1 overflow-auto">
            <section class="pt-5 pl-2 pr-2 pb-5 border mb-10 rounded bg-white shadow">
                <div class="font-sans">
                    <h2 class="text-sm break-normal text-black break-normal font-sans pb-1 pt-1 text-black">
                        Filter
                    </h2>
                    <p class="text-xs pb-2 font-medium text-gray-500">Hide non matching</code></p>
                    <input type="text" v-model="filterTerm" @input="filterDocs" class="w-full p-2 border-2 border-gray-300 rounded" placeholder="/api/search">
                </div>
            </section>
            <section class="pt-5 pl-2 pr-2 pb-5 border mb-10 rounded bg-white shadow">
                <div class="font-sans">
                    <h2 class="text-sm break-normal text-black break-normal font-sans pb-1 pt-1 text-black">
                        Edit Request Headers
                    </h2>
                    <p class="text-xs pb-2 font-medium text-gray-500">Default headers sent on every request. Format <code>Key:Value</code></p>
                    <prism-editor
                        class="my-prism-editor"
                        style="max-width:100%;min-height:100px;background:#2d2d2d;color: #ccc;resize:both" v-model="requestHeaders" :highlight="highlighter" line-numbers></prism-editor>
                </div>
            </section>
            <h1 class="font-medium mx-3 mt-3" style="width: max-content;min-width:350px;">Routes List</h1>
            <hr class="border-b border-gray-300">
            <table class="table-fixed text-sm mt-5" style="width: max-content">
                <tbody>
                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="#<?php echo e($doc['methods'][0] .'-'. $doc['uri']); ?>" @click="highlightSidebar(<?php echo e($index); ?>)" v-if="!docs[<?php echo e($index); ?>]['isHidden']">
                                <span class="
                                    font-medium
                                    inline-flex
                                    items-center
                                    justify-center
                                    px-2
                                    py-1
                                    text-xs
                                    font-bold
                                    leading-none
                                    rounded
                                    text-<?php echo e(in_array('GET', $doc['methods']) ? 'green': ''); ?>-100 bg-<?php echo e(in_array('GET', $doc['methods']) ? 'green': ''); ?>-500
                                    text-<?php echo e(in_array('POST', $doc['methods']) ? 'black': ''); ?> bg-<?php echo e(in_array('POST', $doc['methods']) ? 'red': ''); ?>-500
                                    text-<?php echo e(in_array('PUT', $doc['methods']) ? 'black': ''); ?>-100 bg-<?php echo e(in_array('PUT', $doc['methods']) ? 'yellow': ''); ?>-500
                                    text-<?php echo e(in_array('PATCH', $doc['methods']) ? 'black': ''); ?>-100 bg-<?php echo e(in_array('PATCH', $doc['methods']) ? 'yellow': ''); ?>-500
                                    text-<?php echo e(in_array('DELETE', $doc['methods']) ? 'white': ''); ?> bg-<?php echo e(in_array('DELETE', $doc['methods']) ? 'black': ''); ?>

                                    ">
                                    <?php echo e($doc['methods'][0]); ?>

                                </span>
                                <span class="text-xs" v-bind:class="docs[<?php echo e($index); ?>]['isActiveSidebar'] ? 'font-bold':''">
                                    <span class="text-gray-800 pr-1 pl-1" v-if="docs[<?php echo e($index); ?>]['responseOk'] === null"><?php echo e($doc['uri']); ?></span>
                                    <span class="font-bold text-green-600 border rounded-full pr-1 pl-1 border-green-600" v-if="docs[<?php echo e($index); ?>]['responseOk'] === true">
                                        <?php echo e($doc['uri']); ?> -
                                        <span
                                            class="inline-flex text-xs"
                                            v-text="'Status:'+docs[<?php echo e($index); ?>]['responseCode'] + ', Took:' + docs[<?php echo e($index); ?>]['responseTime'] + 'ms'">
                                        </span>
                                    </span>
                                    <span class="font-bold text-red-600 border rounded-full pr-1 pl-1 border-red-500" v-if="docs[<?php echo e($index); ?>]['responseOk'] === false">
                                        <?php echo e($doc['uri']); ?> -
                                        <span
                                            class="inline-flex text-xs"
                                            v-text="'Status:'+docs[<?php echo e($index); ?>]['responseCode'] + ', Took:' + docs[<?php echo e($index); ?>]['responseTime'] + 'ms'">
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </aside>
         <br><br>
         <div class="ml-6 mr-6 pl-2 w-2/3 p-2" style="width: 100%">
            <h1 class="pl-2 pr-2 break-normal text-black break-normal font-sans text-black font-medium">
                Routes List
            </h1>
            <hr class="border-b border-gray-300">
            <br>
            <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="pt-5 pl-2 pr-2 pb-5 border mb-10 rounded bg-white shadow" v-if="!docs[<?php echo e($index); ?>]['isHidden']">
                <div class="font-sans" id="<?php echo e($doc['httpMethod'] .'-'. $doc['uri']); ?>">
                <h1 class="text-sm break-normal text-black bg-indigo-50 break-normal font-sans pb-1 pt-1 text-black">
                    <span class="w-20
                        font-medium
                        inline-flex
                        items-center
                        justify-center
                        px-2
                        py-1
                        text-xs
                        font-bold
                        leading-none
                        rounded
                        text-<?php echo e(in_array('GET', $doc['methods']) ? 'green': ''); ?>-100 bg-<?php echo e(in_array('GET', $doc['methods']) ? 'green': ''); ?>-500
                        text-<?php echo e(in_array('POST', $doc['methods']) ? 'black': ''); ?> bg-<?php echo e(in_array('POST', $doc['methods']) ? 'red': ''); ?>-500
                        text-<?php echo e(in_array('PUT', $doc['methods']) ? 'black': ''); ?>-100 bg-<?php echo e(in_array('PUT', $doc['methods']) ? 'yellow': ''); ?>-500
                        text-<?php echo e(in_array('PATCH', $doc['methods']) ? 'black': ''); ?>-100 bg-<?php echo e(in_array('PATCH', $doc['methods']) ? 'yellow': ''); ?>-500
                        text-<?php echo e(in_array('DELETE', $doc['methods']) ? 'white': ''); ?> bg-<?php echo e(in_array('DELETE', $doc['methods']) ? 'black': ''); ?>

                        ">
                        <?php echo e($doc['methods'][0]); ?>

                    </span>
                    <span class="">
                        <a href="#<?php echo e($doc['uri']); ?>"><?php echo e($doc['uri']); ?></a>
                    </span>
                </h1>
                </div>
                <hr class="border-b border-grey-light">

                <table class="table-fixed text-sm mt-5">
                    <tbody>
                        <tr>
                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">HTTP Method</td>
                            <td class="align-left pl-2 pr-2 font-bold break-all"><?php echo e($doc['httpMethod']); ?></td>
                        </tr>
                        <tr>
                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">URL</td>
                            <td class="align-left pl-2 pr-2 break-all">
                                <a target="_blank" href="{{window.location.origin}}/<?php echo e($doc['uri']); ?>">{{window.location.origin}}/<?php echo e($doc['uri']); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Controller</td>
                            <td class="align-left pl-2 pr-2 break-all"><?php echo e($doc['controller_full_path']); ?></td>
                        </tr>
                        <tr>
                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Controller Method</td>
                            <td class="align-left pl-2 pr-2 break-all"><?php echo e("@" .$doc['method']); ?></td>
                        </tr>
                        <?php $__currentLoopData = $doc['middlewares']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middleware): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Middleware <?php echo e($loop->index + 1); ?></td>
                                <td class="align-left pl-2 pr-2 break-all"><?php echo e($middleware); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div v-if="docs[<?php echo e($index); ?>]['docBlock']" class="border-2 mr-4 mt-4 p-4 rounded text-sm">
                    <h3 class="font-bold">LRD Docs</h3>
                    <vue-markdown><?php echo $doc['docBlock']; ?></vue-markdown>
                </div>
                <br>
                <?php if(!empty($doc['rules'])): ?>
                <table class="table-fixed align-left text-sm mt-5">
                    <thead class="border">
                    <tr class="border">
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">No.</th>
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">Attributes</th>
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">Type</th>
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">Nullable</th>
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">Bail</th>
                        <th class="border border-gray-300 pl-2 pr-16 pt-1 pb-1 w-min text-left bg-gray-200">Rules</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $doc['rules']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $rules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border">
                        <td class="border pl-3 pt-1 pb-1 pr-2"><?php echo e($loop->index+1); ?></td>
                        <td class="border pl-3 pt-1 pb-1 pr-2 bg-gray-200">
                            <?php echo e($attribute); ?>

                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(str_contains($rule, 'required')): ?>
                                <sup class="text-red-500 font-bold"> *required</sup>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="border pl-3 pt-1 pb-1 pr-2">
                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(str_contains($rule, 'integer')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-800 bg-blue-300 rounded">Integer</span>
                                <?php endif; ?>
                                <?php if(str_contains($rule, 'string')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-100 bg-green-500 rounded">String</span>
                                <?php endif; ?>
                                <?php if(str_contains($rule, 'array')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-blue-200 rounded">Array</span>
                                <?php endif; ?>
                                <?php if(str_contains($rule, 'date')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-yellow-400 rounded">Date</span>
                                <?php endif; ?>
                                <?php if(str_contains($rule, 'boolean')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-green-400 rounded">Boolean</span>
                                <?php endif; ?>
								<?php if(str_contains($rule, 'file') || str_contains($rule, 'image')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-green-400 rounded">File</span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="border pl-3 pt-1 pb-1 pr-2 bg-gray-100 text-center">
                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(str_contains($rule, 'nullable')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none rounded">Nullable</span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="border pl-3 pt-1 pb-1 pr-2 text-center">
                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(str_contains($rule, 'bail')): ?>
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-500 rounded">Bail</span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="border pl-3 pr-2 break-all">
                            <div class="font-mono">
                                <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = explode('|', $rule); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!in_array($r, ['required', 'integer', 'string', 'boolean', 'array', 'nullable', 'bail', 'file', 'image'])): ?>
                                            <?php echo e($r); ?>

                                            <?php if(!$loop->last): ?>
                                            <span class="text-gray-900 font-bold">|</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php endif; ?>
                <button
                    class="hover:bg-red-500 font-semibold hover:text-white mt-2 pl-5 pr-5 border-gray-700 hover:border-transparent shadow-inner border-2 rounded-full"
                    v-if="!docs[<?php echo e($index); ?>]['try']"
                    v-on:click="docs[<?php echo e($index); ?>]['try'] = !docs[<?php echo e($index); ?>]['try'];docs[<?php echo e($index); ?>]['cancel'] = !docs[<?php echo e($index); ?>]['cancel']"
                >
                    Try
                </button>

                <button
                    class="hover:bg-red-500 font-semibold hover:text-white mt-2 pl-5 pr-5 border-gray-700 hover:border-transparent shadow-inner border-2 rounded-full"
                    v-if="!docs[<?php echo e($index); ?>]['cancel']"
                    v-on:click="docs[<?php echo e($index); ?>]['cancel'] = !docs[<?php echo e($index); ?>]['cancel'];docs[<?php echo e($index); ?>]['try'] = !docs[<?php echo e($index); ?>]['try'];"
                >
                    Cancel
                </button>

                <button
                    v-if="docs[<?php echo e($index); ?>]['try']"
                    @click="request(docs[<?php echo e($index); ?>])"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-2 border-blue-800 border-2 shadow-inner mb-1 pl-5 pr-5 rounded-full"
                >
                    <svg
                        v-if="docs[<?php echo e($index); ?>]['loading']"
                        class="animate-spin h-4 w-4 rounded-full bg-transparent border-2 border-transparent border-opacity-50 inline pr-2" style="border-right-color: white; border-top-color: white;" viewBox="0 0 24 24"></svg>
                    Run
                </button>

                <div class="grid grid-cols-1 mt-3 pr-2 overflow-auto">
                    <div class="">
                        <div v-if="docs[<?php echo e($index); ?>]['try']">
                            <h3 class="font-medium">REQUEST URL<sup class="text-red-500 font-bold"> *required</sup></h3>
                            <p class="text-xs pb-2 font-medium text-gray-500">Enter your request URL with query params</p>
                            <prism-editor class="my-prism-editor"
                            style="padding:15px 0px 15px 0px;min-height:20px;background:#2d2d2d;color: #ccc;resize:both;"
                            v-model="docs[<?php echo e($index); ?>]['url']" :highlight="highlighter" line-numbers></prism-editor>
                            <br>
                            <?php if(!in_array('GET', $doc['methods'])): ?>
                            <h3 class="font-medium">REQUEST BODY<sup class="text-red-500"> *required</sup></h3>
                            <p class="text-xs pb-2 font-medium text-gray-500">JSON body for the POST|PUT|DELETE request</p>
                            <prism-editor
                                class="my-prism-editor"
                                style="min-height:200px;background:#2d2d2d;color: #ccc;resize:both"
                                v-model="docs[<?php echo e($index); ?>]['body']"
                                :highlight="highlighter"
                                line-numbers></prism-editor>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr class="border-b border-dotted mt-4 mb-2 border-gray-300">
                    <div class="grid grid-cols-2 gap-2" v-if="docs[<?php echo e($index); ?>]['response'] && !docs[<?php echo e($index); ?>]['cancel']">
                        <div class="border-r-2">
                            <h3 class="font-medium">
                                RESPONSE
                                <p class="text-xs pt-2 pb-2 font-medium text-gray-500">
                                    Response status, code and time.
                                </p>
                            </h3>
                            <table class="table-fixed text-sm mt-5">
                                <tbody>
                                    <tr>
                                        <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Status</td>
                                        <td class="align-left pl-2 pr-2 break-all">
                                            <span
                                            v-if="docs[<?php echo e($index); ?>]['responseOk']"
                                            class="inline-flex  text-xs font-bold leading-none text-green-700">
                                                SUCCESS
                                            </span>
                                            <span
                                                v-if="!docs[<?php echo e($index); ?>]['responseOk']"
                                                class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-500 rounded">
                                                ERROR
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Status Code</td>
                                        <td class="align-left pl-2 pr-2 break-all">
                                            <span
                                                v-if="docs[<?php echo e($index); ?>]['responseOk']"
                                                class="inline-flex text-xs font-bold text-green-900"
                                                v-text="docs[<?php echo e($index); ?>]['responseCode']">
                                            </span>
                                            <span
                                                v-if="!docs[<?php echo e($index); ?>]['responseOk']"
                                                class="inline-flex text-xs font-bold text-red-900"
                                                v-text="docs[<?php echo e($index); ?>]['responseCode']">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Memory Usage</td>
                                        <td class="align-left pl-2 pr-2 break-all">
                                            <span
                                                v-if="docs[<?php echo e($index); ?>]['memory']"
                                                class="inline-flex text-xs font-bold text-red-900"
                                                v-text="docs[<?php echo e($index); ?>]['memory']">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Response Time</td>
                                        <td class="align-left pl-2 pr-2 break-all">
                                            <span
                                                v-if="docs[<?php echo e($index); ?>]['responseTime']"
                                                class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-yellow-400 rounded"
                                                v-text="docs[<?php echo e($index); ?>]['responseTime'] + 'ms'">
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-xs pt-2 pb-2 font-medium text-gray-500">
                                Response headers.
                            </p>
                            <prism-editor
                                v-if="docs[<?php echo e($index); ?>]['responseHeaders']"
                                class="my-prism-editor shadow-inner border-gray-400 border-2 rounded"
                                style="width:75%;min-height:100px;height:200px;background:#fefefe;color: rgb(66, 63, 63);resize:both"
                                readonly
                                v-model="docs[<?php echo e($index); ?>]['responseHeaders']"
                                :highlight="highlighterAtom"
                                line-numbers></prism-editor>
                        </div>
                        <div>
                            <p class="text-xs pb-2 font-medium text-gray-800">Response from the server</p>
                            <prism-editor
                                v-if="docs[<?php echo e($index); ?>]['response']"
                                class="my-prism-editor shadow-inner border-gray-400 border-2 rounded"
                                style="min-height:100px;height:300px;background:#2d2d2d;color: #ccc;resize:both"
                                readonly
                                v-model="docs[<?php echo e($index); ?>]['response']"
                                :highlight="highlighter"
                                line-numbers></prism-editor>
                        </div>
                        <div class="border-r-2">
                            <h3 class="font-medium mt-10">
                                SQL
                            </h3>
                            <p v-if="!docs[<?php echo e($index); ?>]['queries'].length" class="text-xs pb-2 font-medium text-gray-500">
                                No SQL queries executed for this request.
                            </p>
                            <p v-if="docs[<?php echo e($index); ?>]['queries'].length" class="text-xs pb-2 font-medium text-gray-500">
                                SQL queries executed for this request.
                                <table class="table-fixed text-sm mt-5">
                                    <tbody>
                                        <tr>
                                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Total Queries</td>
                                            <td class="align-left pl-2 pr-2 break-all">
                                                <div v-text="docs[<?php echo e($index); ?>]['queries'].length"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-left pl-2 pr-2 bg-gray-100 border-r-2">Total Query time</td>
                                            <td class="align-left pl-2 pr-2 break-all">
                                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-yellow-400 rounded">
                                                    <span v-text="docs[<?php echo e($index); ?>]['queries'].reduce((total, query) => total + query.time, 0).toFixed(2)"></span>ms
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                        </div>
                        <div class="">
                                <p class="text-xs mt-10 font-medium text-gray-500">
                                    SQL queries
                                </p>
                                <div v-for="(query, index) in docs[<?php echo e($index); ?>]['queries']">
                                    <p class="mt-2 text-sm font-medium">{{index+1}}.
                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-800 bg-yellow-500 rounded mb-1">
                                            {{query.time}}ms
                                        </span>
                                    </p>
                                    <prism-editor
                                        v-model="sqlFormatter.format(query['sql'])"
                                        class="my-prism-editor"
                                        style="padding:10px 0px 10px 0px;min-height:20px;height:350px;background:rgb(52 33 33);color: #ccc;resize:both;"
                                        readonly
                                        :highlight="highlighter"
                                        line-numbers></prism-editor>
                                </div>
                        </div>
                    </div>
                  </div>
            </section>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
      <script>
        var guessValue = function(attribute, rules) {
            // match max:1
            var validations = {
                max: 100,
                min: 1,
                isInteger: null,
                isString: null,
                isArray: null,
                isDate: null,
                isIn: null,
				isBoolean: null,
				isFile: null,
                value: '',
            }
            rules.map(function(rule) {
                validations.isRequired = rule.match(/required/)
                validations.isDate = rule.match(/date/)
                validations.isArray = rule.match(/array/)
                validations.isString = rule.match(/string/)
				validations.isBoolean = rule.match(/boolean/)
				validations.isFile = rule.match(/file|image/)
                if (rule.match(/integer/)) {
                    validations.isInteger = true
                }
                if (rule.match(/min:([0-9]+)/)) {
                    validations.min = rule.match(/min:([0-9]+)/)[1]
                    if (!validations.min) {
                        validations.min = 1
                    }
                }
                if (rule.match(/max:([0-9]+)/)) {
                    validations.max = rule.match(/max:([0-9]+)/)[1]
                    if (!validations.max) {
                        validations.max = 100
                    }
                }
            })

            if (validations.isString) {
                validations.value = faker.name.findName()
            }
            if (validations.isInteger) {
                validations.value = Math.floor(Math.random() * (validations.max - validations.min + 1) + validations.min)
            }
            if (validations.isDate) {
                validations.value = new Date(faker.date.between(new Date(), new Date())).toISOString().slice(0, 10)
            }
			if (validations.isBoolean) {
                validations.value = true
            }
			if (validations.isFile) {
                validations.value = {}
            }

            return validations
        }
        var docs = <?php echo json_encode($docs); ?>;
        var app_url = <?php echo json_encode(config('app.url')); ?>;

        //remove trailing slash if any
        app_url = app_url.replace(/\/$/, '')
        docs.map(function(doc, index) {
            doc.response = null
            doc.responseCode = 200
            doc.queries = []
            doc.responseOk = null
            doc.body = "{}"
            doc.isActiveSidebar = window.location.hash.substr(1) === doc['methods'][0] +"-"+ doc['uri']
            doc.url = app_url + "/"+ doc.uri
            doc.try = false
            doc.cancel = true
            doc.loading = false
            doc.responseTime = null
            doc.memory = null
            // check in array
            if (doc.methods[0] == 'GET') {
                var idx = 1
                Object.keys(doc.rules).map(function(attribute) {
                    // check contains in string
                    if (attribute.indexOf('.*') !== -1) {
                        return
                    }
                    let value = guessValue(attribute, doc.rules[attribute])
                    if (!value.isRequired) {
                        //return
                    }

                    let attr = attribute
                    if (value.isArray) {
                        attr = attribute + "[]"
                    }
                    if (idx === 1) {
                        doc.url += "\n"+ "?"+attr+"="+value.value+"\n"
                    } else {
                        doc.url += "&"+attr+"="+value.value+"\n"
                    }
                    idx++
                })
            }

            // assume to be POST, PUT, DELETE
            if (doc.methods[0] != 'GET') {
                body = {}
                Object.keys(doc.rules).map(function(attribute) {
                    // ignore the child attributes
                    if (attribute.indexOf('.*') !== -1) {
                        return
                    }
                    let value = guessValue(attribute, doc.rules[attribute])
                    if (value.isArray) {
                        body[attribute] = [value.value]
                    } else {
                        body[attribute] = value.value
                    }
                })
                doc.body = JSON.stringify(body, null, 2)
            }

        })
        Vue.use(VueMarkdown);

        var app = new Vue({
            el: '#app',
            data: {
                docs: docs,
                showRoute: false,
                requestHeaders: '',
                filterTerm: ''
            },
            created: function () {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                axios.defaults.headers.common['Authorization'] = 'Bearer '
                this.requestHeaders = JSON.stringify(axios.defaults.headers.common, null, 2)
            },
            methods: {
                highlightSidebar(idx) {
                    docs.map(function(doc, index) {
                        doc.isActiveSidebar = index == idx
                    })
                },
                highlighter(code) {
                    return Prism.highlight(code, Prism.languages.js, "js");
                },
                highlighterAtom(code) {
                    return Prism.highlight(code, Prism.languages.atom, "js");
                },
                filterDocs() {
                    for (doc of this.docs) {
                        doc['isHidden'] = !doc['uri'].includes(this.filterTerm)
                    }
                },
                request(doc) {

                    // convert string to lower case
                    var method = doc['methods'][0].toLowerCase()

                    // remove \n from string that is used for display
                    var url = doc.url.replace(/\n/g, '')

                    try {
                        var json = JSON.parse(doc.body.replace(/\n/g, ''))
                    } catch (e) {
                        doc.response = "Cannot parse JSON request body"
                        return
                    }

                    try {
                        axios.defaults.headers.common = JSON.parse(this.requestHeaders)
                        axios.defaults.headers.common['X-Request-LRD'] = 'lrd'
                    } catch (e) {
                        doc.response = "Cannot parse JSON request headers"
                        return
                    }
                    doc.queries = []
                    doc.response = null
                    doc.responseOk = null
                    doc.responseTime = null
                    doc.responseHeaders = null
                    doc.loading = true

                    let startTime = new Date().getTime();
                    axios({
                        method: method,
                        url: url,
                        data: json,
                        decompress: true,
                        withCredentials: true
                      }).then(response => {
                        console.log("response", response)
                        doc.responseOk = true
                        if (response && response.data) {
                            if (response.data['_lrd']) {
                                doc.queries = response.data['_lrd']['queries']
                                doc.memory = response.data['_lrd']['memory']
                                delete response.data['_lrd']
                            }
                            doc.response = JSON.stringify(response.data, null, 2)
                            doc.responseCode = response.status
                            doc.responseHeaders = JSON.stringify(response.headers, null, 2)
                        }

                      }).catch(error => {
                        doc.responseOk = false
                        console.log("error", error)
                        if (error && error.response && error.response.data) {
                            console.log("error response", error.response)
                            if (error.response.data['_lrd']) {
                                doc.queries = error.response.data['_lrd']['queries']
                                doc.memory = error.response.data['_lrd']['memory']
                                delete error.response.data['_lrd']
                            }
                            doc.responseCode = error.response.status;
                            doc.responseHeaders = JSON.stringify(error.response.headers, null, 2)
                            doc.response = JSON.stringify(error.response.data, null, 2)
                        }

                      }).then(function () {
                        let endTime = new Date().getTime()
                        doc.loading = false
                        doc.responseTime = endTime - startTime;
                      })
                },
            },
          });
      </script>
   </body>
</html>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/vendor/rakutentech/laravel-request-docs/src/../resources/views/index.blade.php ENDPATH**/ ?>