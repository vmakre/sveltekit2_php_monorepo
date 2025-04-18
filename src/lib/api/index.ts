import createClient from "openapi-fetch";
import type { paths } from "./model_codegen";
import { PUBLIC_SERVER, PUBLIC_CRUD_API } from '$env/static/public';

const client = createClient<paths>({ baseUrl: PUBLIC_SERVER+'/'+PUBLIC_CRUD_API });

export default client;